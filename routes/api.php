<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NoteController;

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

Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::patch('/customers/{id}', [CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'delete']);


Route::group(['prefix' => 'customers'], function() {
    Route::get('/{customer_id}/notes', [NoteController::class, 'index']);
    Route::post('/{customer_id}/notes', [NoteController::class, 'store']);
    Route::get('/{customer_id}/notes/{id}', [NoteController::class, 'show']);
    Route::patch('/{customer_id}/notes/{id}', [NoteController::class, 'update']);
    Route::delete('/{customer_id}/notes/{id}', [NoteController::class, 'delete']);
});


