<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\TransactionController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group( function () {
    Route::post('token-update', [AuthController::class, 'tokenUpdate']);
    Route::post('all-notifications', [AuthController::class, 'allNofications']);
    Route::post('all-transactions', [TransactionController::class, 'allTransactions']);
    Route::get('single-transactions/{id}', [TransactionController::class, 'singleTransactions']);
    Route::get('contact-us', [ContactController::class, 'getContact']);
    Route::post('send-msg', [ContactController::class, 'suggest']);


    //notifications APIs
    Route::get('list-notifications', [TransactionController::class, 'listNofications']);
   // Route::get('notification/{id}', [TransactionController::class, 'singleNofication']);
    Route::post('update_notifications', [TransactionController::class, 'updateNotifications']);
  

});
