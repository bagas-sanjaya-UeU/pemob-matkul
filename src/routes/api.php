<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\ProductHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\CreateHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\DetailHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\UpdateHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\DeleteHandler;
use App\Filament\Admin\Resources\ProductResource\Api\Handlers\PaginationHandler;

use App\Http\Controllers\Api\AuthController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::get('/products', PaginationHandler::class);
    Route::post('/products', CreateHandler::class);
    Route::get('/products/{id}', DetailHandler::class);
    Route::put('/products/{id}', UpdateHandler::class);
    Route::delete('/products/{id}', DeleteHandler::class);
});








