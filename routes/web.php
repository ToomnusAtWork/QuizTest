<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test' , [App\Http\Controllers\QuizController::class, 'index'])->name('test');
Route::post('/test/fr', [App\Http\Controllers\QuizController::class, 'fetchRegion']);
Route::post('/test/fc', [App\Http\Controllers\QuizController::class, 'fetchCity']);
Route::post('/test/fd', [App\Http\Controllers\QuizController::class, 'fetchDistrict']);
Route::post('/sumbit-test', [App\Http\Controllers\QuizController::class, 'store'])->name('testaddress.create');
