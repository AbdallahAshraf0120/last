<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('showTimeCard',[ApiController::class,'getTimeCard']);
// Route::get('employee',[ApiController::class,'employee']);

Route::get('/', function(){
    return view('mainpage');
});


Route::get('showTimeCard',[ApiController::class,'showTimeCardData']);
Route::get('employee',[ApiController::class,'showEmplyeeData']);
Route::get('showTimeMachine',[ApiController::class,'showTimeMchine']);

Route::post('/RunGetgetTimeCard', [ApiController::class, 'RunGetgetTimeCard'])->name('RunGetgetTimeCard');
Route::post('/RunGetEmployee', [ApiController::class, 'RunGetEmployee'])->name('RunGetEmployee');
Route::post('/RunGetTimemeMachine', [ApiController::class, 'RunGetTimemeMachine'])->name('RunGetTimemeMachine');
