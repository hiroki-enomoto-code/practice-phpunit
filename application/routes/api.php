<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculateController;

//ヘルスチェック

Route::prefix('calculate')->group(function () {
    Route::get('/', function () {
        return response()->json(['status' => 'OK']);
    });
    
    Route::post('/sum', [CalculateController::class, 'sum']);
    Route::post('/subtract', [CalculateController::class, 'subtract']);
    Route::post('/multiply', [CalculateController::class, 'multiply']);
    Route::post('/divide', [CalculateController::class, 'divide']); 
});