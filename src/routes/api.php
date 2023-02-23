<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PurchaseController;

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

 // Service #1

Route::get('/offers', [OfferController::class, 'show']);

//Service #2

Route::post('/buy', [PurchaseController::class, 'store']);


Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});
