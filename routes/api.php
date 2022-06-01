<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Localization;
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
Route::middleware("localization")->group(function () {
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('testNotification', [TransactionController::class,'testNotification'])->name('testNotification');
Route::get('policy', [ContactController::class, 'getPolicy']);
Route::middleware('auth:api')->group( function () {
    Route::post('token-update', [AuthController::class, 'tokenUpdate']);
    Route::post('update-user', [AuthController::class, 'updateUser']);
    Route::post('all-transactions', [TransactionController::class, 'allTransactions']);
    // Route::post('update-transactions', [TransactionController::class, 'updateNotifications']);
    Route::get('home-data', [TransactionController::class, 'homeData']);
    Route::get('single-transactions/{id}', [TransactionController::class, 'singleTransactions']);
    Route::get('contact-us', [ContactController::class, 'getContact']);
    Route::post('send-msg', [ContactController::class, 'suggest']);
    Route::post('update-user-image', [AuthController::class, 'updateUserImage']);
});

    //notifications APIs
    Route::get('list-notifications', [TransactionController::class, 'listNofications']);
   // Route::get('notification/{id}', [TransactionController::class, 'singleNofication']);
    Route::post('update_notifications', [TransactionController::class, 'updateNotifications']);

    Route::post('add_firebase_token', [TransactionController::class, 'addFirebaseToken']);


    Route::get('faq', [ContactController::class, 'getFaq']);

    Route::get('about-us', [ContactController::class, 'aboutUs']);
});
