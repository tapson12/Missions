<?php

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
    return view('welcome');
});
Route::get('/parametrage', function () {
    return view('parametragehome');
});

Route::get('/type-structure',[App\Http\Controllers\TypeStructureController::class, 'index']);

Route::get('/region',[App\Http\Controllers\RegionController::class, 'index']);
Route::post('/save-region',[App\Http\Controllers\RegionController::class, 'creer']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
