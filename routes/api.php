<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TimeCardController;
use App\Http\Controllers\TimeMachineController;
use App\Http\Controllers\AbsenceRequestController;
use App\Http\Controllers\AuthController;

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

// Route::post('/login', [EmployeeController::class, 'login']);

// Protect routes
// Route::middleware('auth:sanctum')->group(function () {
//     // List emp time card
//     Route::get('/time-cards', [TimeCardController::class, 'index']);

//     // List emp time machine
//     Route::get('/time-machines', [TimeMachineController::class, 'index']);

//     // List emp absences request
//     Route::get('/absence-requests', [AbsenceRequestController::class, 'index']);
// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class,'login']);
Route::get('/timecard', [AuthController::class, 'getTimeCard'])->middleware('auth');
