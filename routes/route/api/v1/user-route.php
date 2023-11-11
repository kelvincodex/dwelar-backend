<?php

use \Illuminate\Support\Facades\Route;

Route::prefix("user")->controller(\App\Http\Controllers\Api\V1\UserController::class)->group(function (){
    Route::post("/create", "create");
    Route::get("/read/all", "readAll");
});
