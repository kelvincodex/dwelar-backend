<?php

namespace App\Http\Services\Api\V1;

use App\Http\Requests\Api\V1\Auth\CompleteEnrollmentRequest;
use App\Http\Requests\Api\V1\Auth\InitiateEnrollmentRequest;
use App\Http\Resources\Api\V1\Auth\CompleteEnrollmentResource;
use App\Http\Resources\Api\V1\Auth\InitiateEnrollmentResource;
use App\Http\Response\BaseResponse;
use App\Mail\CompletedEnrollmentMail;
use App\Mail\SentOtpMail;
use App\Models\User;
use App\Utils\constant\BaseResponseUtil;
use App\Utils\constant\UserStatusUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    public function initiateEnrollment(InitiateEnrollmentRequest $initiateEnrollmentRequest, User $user){
        $validated = $initiateEnrollmentRequest->validated();
        unset($validated['retypePassword']);
        $validated['otp'] = random_int(10000, 99999);
        $validated['otpExpiredAt'] = now()->addMinutes(2);
        //TODO Username
//        list($localPart, $domainPart) = explode('@', $validated['email']);
//        $validated['username'] = $localPart . random_int(10, 999);

        $response = $user->create($validated);

        if (!$response){
            return BaseResponse::error(BaseResponseUtil::SOMETHING_WENT_WRONG, "Something went wrong.");
        }

        Mail::to($validated['email'])->send(new SentOtpMail($response));
        $user = $user->find($response->userId);
        if (!$user){
            return BaseResponse::error(BaseResponseUtil::NOT_FOUND, "Couldn't provide user info.");
        }
        return BaseResponse::success(BaseResponseUtil::SUCCESSFUL, "Otp has been sent to your email: {$validated['email']}", InitiateEnrollmentResource::make($user));
    }
    public function completeEnrollment(CompleteEnrollmentRequest $completeEnrollmentRequest, User $user){
        $validate = $completeEnrollmentRequest->validated();

        //Todo check if user exist
        $user = $user->where('userId', $validate['userId'])->first();
        if (!$user){
            return BaseResponse::error(BaseResponseUtil::NOT_FOUND, "Unable to find result");
        }
        //Todo if otp expired
        if ($user->otpExpiredAt < now()){
            return BaseResponse::error(BaseResponseUtil::OTP_EXPIRED, "OTP Expired, request for a resend otp.");
        }

        //Todo check if otp matches
        if ($user->otp !== $validate['otp']){
            return BaseResponse::error(BaseResponseUtil::OTP_INVALID, "Invalid OTP");
        }

        //Todo if user is verified and status is pending
        if ($user->verified && $user->status !== UserStatusUtil::PENDING){
            return BaseResponse::error(BaseResponseUtil::ERROR, "This User Is Already Verified");
        }

        //Todo update user
        $updateUser = $user->update([
            'verified'=> true,
            'status'=> UserStatusUtil::INACTIVE
        ]);

        if (!$updateUser){
            return BaseResponse::error(BaseResponseUtil::SOMETHING_WENT_WRONG, "Something went wrong.");
        }

        Mail::to($user['email'])->send(new CompletedEnrollmentMail($user));
        return BaseResponse::success(BaseResponseUtil::SUCCESSFUL, "Verification Completed Successful", CompleteEnrollmentResource::make($user));
    }

    public function resendOtp(Request $request, User $user){
        $userId = $request->query("userId");
        if (!$userId){
            return BaseResponse::error(BaseResponseUtil::NOT_FOUND, "userId params can't be null");
        }

        $user = $user->where('userId', $userId)->first();

        if (!$user){
            return BaseResponse::error(BaseResponseUtil::NOT_FOUND, "No record found with this userId: $userId");
        }

        $updateOtp = $user->update([
            'otp'=> random_int(10000, 99999),
            'otpExpiredAt'=> now()->addMinutes(2)
        ]);

        if (!$updateOtp){
            return BaseResponse::error(BaseResponseUtil::SOMETHING_WENT_WRONG, "Something went wrong");
        }

        Mail::to($user['email'])->send(new SentOtpMail($user));

        return BaseResponse::success(BaseResponseUtil::SUCCESSFUL, "Otp has been sent to your email: {$user['email']}");
    }
}
