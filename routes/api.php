<?php

use App\Http\Controllers\TrafficController;
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

Route::group(['controller' => TrafficController::class, 'prefix' => 'traffic'], function () {
    Route::post('move/{color}', 'handleMove')->name('traffic.move');
});
