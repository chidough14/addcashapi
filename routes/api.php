<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ClientController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get all stocks
Route::get('/stocks', [StockController::class, 'getStocks']);

//create stock
Route::post('/stock', [StockController::class, 'addStock']);

//update stock
Route::put('/editStock/{id}', [StockController::class, 'editStock']);

//delete stock
Route::delete('/deleteStock/{id}', [StockController::class, 'deleteStock']);


//create client
Route::post('/client', [ClientController::class, 'addClient']);

//get all client
Route::get('/clients', [ClientController::class, 'getClients']);


//create purchase
Route::post('/purchase', [PurchaseController::class, 'addPurchase']);

//get client purchase
Route::get('/purchases/{client_id}', [PurchaseController::class, 'getPurchase']);

