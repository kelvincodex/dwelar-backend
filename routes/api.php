<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {

    foreach (scandir(__DIR__ . "/route/api/v1") as $filename) {

        $path = __DIR__ . "/route/api/v1/" . $filename;

        if (is_file($path)) {
            require $path;
        }

    }
});

foreach (scandir(__DIR__ . "/route/websocket/v1") as $filename) {

    $path = __DIR__ . "/route/websocket/v1/" . $filename;

    if (is_file($path)) {
        require $path;
    }

}
