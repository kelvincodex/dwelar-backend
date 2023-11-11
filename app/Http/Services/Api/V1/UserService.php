<?php

namespace App\Http\Services\Api\V1;

use App\Http\Requests\Api\V1\User\CreateUserRequest;
use App\Http\Response\BaseResponse;
use App\Mail\SentOtpMail;
use App\Models\User;
use App\Utils\constant\BaseResponseUtil;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function create(CreateUserRequest $createUserRequest, User $user){
        $validated = $createUserRequest->validated();

        $response = $user->create($validated);


        if (!$response){
            return BaseResponse::success(BaseResponseUtil::ERROR, 'Unable To Create Account.');
        }

        Mail::to($validated['email'])->send(new SentOtpMail($response));
        return BaseResponse::success(BaseResponseUtil::SUCCESSFUL, 'User Created Successful');
    }

    public function readAll(User $user){
        $response = $user->all();
        return BaseResponse::success(BaseResponseUtil::SUCCESSFUL, null, $response);
    }
}
