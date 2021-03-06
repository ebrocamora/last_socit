<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('test', function (Request $request) {
    return 'test';
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/event', [DashboardController::class, 'validateCode']);
    Route::get('/user/points', [DashboardController::class, 'getCurrentUserPoints']);
});
