<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\ControllerLogin;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/count', [App\Http\Controllers\Api\NotificationController::class, 'count'])->name('count');

Route::post('/sanctum/token',    [ControllerLogin::class,'Create_Token']);
Route::post('/add',              [ControllerReclamation::class,'SendReclamation']);
Route::get('/fetch_temperature', [InformationController::class,'GetTemperature']);
Route::get('/fetch_humidite',    [InformationController::class,'GetHumidite']);
Route::get('/fetch_eclairage',   [InformationController::class,'GetEclairage']);



Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'tokens is deleted';
});
