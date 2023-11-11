<?php

namespace App\Http\Services\Api\V1;

use App\Http\Requests\Api\V1\KycVerification\KycVerificationRequest;
use App\Http\Response\BaseResponse;
use App\Models\KycVerification;
use App\Models\User;
use App\Utils\ArrayUtil;
use App\Utils\constant\BaseResponseUtil;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class KycVerificationService
{
    public function kycVerification(KycVerificationRequest $kycVerificationRequest, KycVerification $kycVerification, User $user){
        $validated = $kycVerificationRequest->validated();
        $user = $user->find($validated['userId']);

        if (!$user){
            return BaseResponse::error(BaseResponseUtil::NOT_FOUND, "Couldn't get user with that userId");
        }

        $apiKey = "";
        $baseUrl = "";
        if (env("APP_ENV") == 'local'){
            $apiKey = env("BIZGEM_API_KEY_TEST");
//            $baseUrl = env("BIZGEM_TEST");
            $baseUrl = env("BIZGEM_PROD");
        }elseif (env("APP_ENV") == 'prod'){
            $apiKey = env("BIZGEM_API_KEY_PROD");
            $baseUrl = env("BIZGEM_PROD");
        }
        //Todo kyc validation request
        $request = $validated;
        unset($request['userId']);
        $request['reference'] = Str::random(30);

        //Todo kyc validation
        $kycValidation = Http::withHeaders([
            "Authorization"=>"Bearer ".$apiKey
        ])->post($baseUrl."/kyc/bvn", $request);

        //Todo response
        $response = $kycValidation->json();

        if ($response['responseCode'] == "00"){
            dd($validated);
            $kycVerification = $kycVerification->create();

        }else{
            return BaseResponse::error(BaseResponseUtil::ERROR, $response['responseMessage']);
        }

    }

    private function removeItemFromArray(mixed $validated, string $string)
    {
    }
}
