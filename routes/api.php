<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AuthController;
use  App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register');
    Route::post('/forgotPassword','forgotPassword');
    Route::post('/resetpassword','resetpassword')->name('password.reset');
    Route::middleware('auth:api')->group(function (){
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
        
        Route::group(['controller' => CategorieController::class], function () {
            Route::get('/categories','index')->middleware(['permission:view category']);
            Route::post('/categories', 'store')->middleware(['permission:add category']);;
            Route::get('/categories/{category}', 'show')->middleware(['permission:view category']);
            Route::put('/categories/{category}', 'update')->middleware(['permission:edit category']);
            Route::delete('/categories/{category}','destroy')->middleware(['permission:delete category']);
        });

        Route::group(['controller' => ProduitController::class], function () {
            // Route::get('/produits', 'index');
            // Route::get('/produits/{id}','show');
            Route::post('/produits','store')->middleware(['permission:add product']);
            Route::put('/produits/{id}', 'update')->middleware(['permission:edit All product|edit My product']);
            Route::delete('/produits/{id}', 'destroy')->middleware(['permission:delete All product|delete My product']);
        });
    });
});



Route::group(['controller' => UserController::class], function () {
    Route::get('/users', 'index');
    // Route::put('/updateuser/{user}', 'update');
    // Route::put('/updateNameEmail/{user}', 'updateNameEmail');
    // Route::put('/updatePassword/{user}', 'updatePassword');
    Route::delete('/users/{user}', 'destroy');
});

Route::controller(ProduitController::class)->group(function () {
    Route::get('/produits', 'index');
    Route::get('/produits/{id}','show');
});