<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::post('/save-type-structure',[App\Http\Controllers\TypeStructureController::class, 'store']);
Route::post('/update-type-structure',[App\Http\Controllers\TypeStructureController::class, 'edit']);
Route::get('/delete-type-structure/{id}',[App\Http\Controllers\TypeStructureController::class, 'destroy']);

Route::get('/type-vehicule',[App\Http\Controllers\TypeVehiculeController::class, 'index']);
Route::post('/save-type-vehicule',[App\Http\Controllers\TypeVehiculeController::class, 'store']);
Route::post('/update-type-vehicule',[App\Http\Controllers\TypeVehiculeController::class, 'edit']);
Route::get('/delete-type-vehicule/{id}',[App\Http\Controllers\TypeVehiculeController::class, 'destroy']);

Route::get('/vehicule',[App\Http\Controllers\VehiculeController::class, 'index']);
Route::post('/save-vehicule',[App\Http\Controllers\VehiculeController::class, 'store']);
Route::post('/update-vehicule',[App\Http\Controllers\VehiculeController::class, 'edit']);
Route::get('/delete-vehicule/{id}',[App\Http\Controllers\VehiculeController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
