<?php

use App\Http\Controllers\Products\InventoryController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Sales\SalesController;
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

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
});

Route::prefix('inventory')->group(function () {
    Route::get('/', [InventoryController::class, 'getAll']);
    Route::post('/', [InventoryController::class, 'create']);
});

Route::prefix('sales')->group(function () {
    Route::get('/{id}', [SalesController::class, 'getById']);
    Route::post('/', [SalesController::class, 'store']);
});
