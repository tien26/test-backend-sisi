<?php

use App\Http\Controllers\DistributorsController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsDistributorsController;
use App\Models\Distributors;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product', [ProductsController::class, 'index'])->middleware('auth:api');
Route::post('/product/add', [ProductsController::class, 'store'])->middleware('auth:api');

Route::get('/distributor', [DistributorsController::class, 'index'])->middleware('auth:api');
Route::post('/distributor/add', [DistributorsController::class, 'store'])->middleware('auth:api');

Route::get('/distributor-product-price', [ProductsDistributorsController::class, 'index'])->middleware('auth:api');
Route::post('/distributor-product-price/add', [ProductsDistributorsController::class, 'store'])->middleware('auth:api');


// Route::controller(DistributorsController::class)->group(function () {
//     Route::get('distributor', 'index');
//     Route::post('distributor/add', 'store');
// });

// Route::controller(ProductsDistributorsController::class)->group(function () {
//     Route::get('distributor-product-price', 'index');
//     Route::post('distributor-product-price/add', 'store');
// });

Route::post('login', [PersonalController::class, 'login']);
