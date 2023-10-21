<?php

use \Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){
    Route::post("/login", "login");
});
