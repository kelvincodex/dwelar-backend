<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\CompleteEnrollmentRequest;
use App\Http\Requests\Api\V1\Auth\InitiateEnrollmentRequest;
use App\Http\Services\Api\V1\AuthService;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(public AuthService $authService)
    {
    }

    public function initiateEnrollment(InitiateEnrollmentRequest $request, User $user){
        return $this->authService->initiateEnrollment($request, $user);
    }
    public function completeEnrollment(CompleteEnrollmentRequest $request, User $user){
        return $this->authService->completeEnrollment($request, $user);
    }
    public function resendOtp(Request $request, User $user){
        return $this->authService->resendOtp($request, $user);
    }
}
