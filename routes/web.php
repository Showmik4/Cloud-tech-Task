<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome_home'])->name('welcome-home');
Route::get('/getTopUsers', [App\Http\Controllers\HomeController::class, 'getTopUsers'])->name('getTopUsers');
Route::post('/updateTopTopupUsers', [App\Http\Controllers\HomeController::class, 'updateTopTopupUsers'])->name('updateTopTopupUsers');
// Route::get('/run-topupusers-process', 'TopUpUsersProcessController@run')->name('runTopUpUsersProcess');
Route::get('/run-topupusers-process', [App\Http\Controllers\HomeController::class, 'run'])->name('run-topupusers-process');
Route::get('/getTopTopUpUsers', [App\Http\Controllers\HomeController::class, 'getTopTopUpUsers'])->name('getTopTopUpUsers');