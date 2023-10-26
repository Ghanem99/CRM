<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

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
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::get('/customers/{customer}', [CustomerController::class, 'show']);
    Route::patch('/customers/{customer}', [CustomerController::class, 'update']);
    Route::delete('/customers/{customer}', [CustomerController::class, 'delete']);

    Route::get('/customers/{customer}/notes', [NoteController::class, 'index']);
    Route::get('/customers/{customer}/notes/{note}', [NoteController::class, 'show']);
    Route::post('/customers/{customer}/notes', [NoteController::class, 'store']);
    Route::patch('/customers/{customer}/notes/{note}', [NoteController::class, 'update']);
    Route::delete('/customers/{customer}/notes/{note}', [NoteController::class, 'delete']);

    Route::get('/customers/{customer}/projects', [ProjectController::class, 'index']);
    Route::get('/customers/{customer}/projects/{project}', [ProjectController::class, 'show']);
    Route::post('/customers/{customer}/projects', [ProjectController::class, 'store']);
    Route::patch('/customers/{customer}/projects/{project}', [ProjectController::class, 'update']);
    Route::delete('/customers/{customer}/projects/{project}', [ProjectController::class, 'delete']);
});

Route::get('users', [UserController::class, 'index']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::patch('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'delete']);



