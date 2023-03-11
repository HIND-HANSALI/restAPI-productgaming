<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AuthController;

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
Route::group(['controller' => CategorieController::class], function () {
            Route::get('/categories', 'index');
            Route::post('/categories', 'store');
            Route::get('/categories/{category}', 'show');
            Route::put('/categories/{category}', 'update');
            Route::delete('/categories/{category}', 'destroy');
});
Route::group(['controller' => ProduitController::class], function () {
    Route::get('/produits', 'index');
    Route::get('/produits/{id}','show');
    Route::post('/produits','store');
    Route::put('/produits/{id}', 'update');
    Route::delete('/produits/{id}', 'destroy');
});
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register');
    // Route::post('/forgotPassword','forgotPassword');
    Route::middleware('auth:api')->group(function (){
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh'); });
});
