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
    return view('welcome');
});
Route::get('/parametrage', function () {
    return view('parametragehome');
});

Route::get('/type-structure',[App\Http\Controllers\TypeStructureController::class, 'index']);

//route pour les regions
Route::get('/region',[App\Http\Controllers\RegionController::class, 'index']);
Route::post('/save-region',[App\Http\Controllers\RegionController::class, 'store']);
Route::post('/update-region',[App\Http\Controllers\RegionController::class, 'edit']);
Route::get('/delete-region/{id}',[App\Http\Controllers\RegionController::class, 'destroy']);

//route pour les province
Route::get('/province',[App\Http\Controllers\ProvinceController::class, 'index']);
Route::post('/save-province',[App\Http\Controllers\ProvinceController::class, 'store']);
Route::post('/update-province',[App\Http\Controllers\ProvinceController::class, 'edit']);
Route::get('/delete-province/{id}',[App\Http\Controllers\ProvinceController::class, 'destroy']);

//route pour les communes
Route::get('/commune',[App\Http\Controllers\CommuneController::class, 'index']);
Route::post('/save-commune',[App\Http\Controllers\CommuneController::class, 'store']);
Route::post('/update-commune',[App\Http\Controllers\CommuneController::class, 'edit']);
Route::get('/delete-commune/{id}',[App\Http\Controllers\CommuneController::class, 'destroy']);






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
