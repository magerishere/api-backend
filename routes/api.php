<?php

use App\Http\Controllers\Api\V1\MenuController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Menus Routes
    |--------------------------------------------------------------------------
    */
    Route::apiResource('menus', MenuController::class);
    Route::prefix('menus')->as('menus.')->group(function () {
        Route::prefix('get')->as('get.')->group(function () {
            Route::get('types', [MenuController::class, 'getTypes']);
        });
    });

});
