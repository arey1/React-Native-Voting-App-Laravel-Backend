<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;




Route::post('login',[AuthController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('profile',[AuthController::class,'profile']);
    Route::get('/image-link/{filename}', function ($filename) {
        $path = 'public/storage/condidate' . $filename;
        $url = asset($path);
        return ['image_link' => $url];
    });
    Route::get('candidates', [AuthController::class, 'getCandidates']);
    Route::post('vote', [AuthController::class, 'submitVote']);
});