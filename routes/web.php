<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('regime',App\Http\Controllers\RegimeController::class)->middleware('auth');
Route::resource('tax',App\Http\Controllers\TaxController::class)->middleware('auth');
Route::resource('worker',App\Http\Controllers\WorkerController::class)->middleware('auth');
Route::resource('workday',App\Http\Controllers\WorkdayController::class)->middleware('auth');
Route::resource('tcontract',App\Http\Controllers\TcontractController::class)->middleware('auth');
Route::resource('period',App\Http\Controllers\PeriodController::class)->middleware('auth');
Route::resource('setting',App\Http\Controllers\SettingController::class)->middleware('auth');
Route::resource('position',App\Http\Controllers\PositionController::class)->middleware('auth');
Route::resource('project',App\Http\Controllers\ProjectController::class)->middleware('auth');
Route::resource('department',App\Http\Controllers\DepartmentController::class)->middleware('auth');
