<?php

use \Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(\App\Http\Controllers\Api\V1\AuthController::class)->group(function (){
    Route::post("/initiate/enrollment", "initiateEnrollment");
    Route::post("/complete/enrollment", "completeEnrollment");
    Route::get("/resend/otp", "resendOtp");
});
