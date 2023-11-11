<?php

use \Illuminate\Support\Facades\Route;

Route::prefix('kyc')->controller(\App\Http\Controllers\Api\V1\KycVerificationController::class)->group(function (){
    Route::post("/verification", "kycVerification");
});
