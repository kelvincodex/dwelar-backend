<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\KycVerification\KycVerificationRequest;
use App\Http\Requests\Api\V1\User\CreateUserRequest;
use App\Http\Services\Api\V1\KycVerificationService;
use App\Http\Services\Api\V1\UserService;
use App\Models\KycVerification;
use App\Models\User;

class KycVerificationController extends Controller
{
    public function __construct(protected KycVerificationService $kycVerificationService)
    {
    }

    public function kycVerification(KycVerificationRequest $kycVerificationRequest, KycVerification $kycVerification, User $user){
        return $this->kycVerificationService->kycVerification($kycVerificationRequest, $kycVerification, $user);
    }
}
