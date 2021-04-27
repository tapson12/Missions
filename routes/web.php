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
// url for manage type structure 
Route::get('/type-structure',[App\Http\Controllers\TypeStructureController::class, 'index']);
Route::post('/save-type-structure',[App\Http\Controllers\TypeStructureController::class, 'store']);
Route::post('/update-type-structure',[App\Http\Controllers\TypeStructureController::class, 'edit']);
Route::get('/delete-type-structure/{id}',[App\Http\Controllers\TypeStructureController::class, 'destroy']);


// url for structure 
Route::get('/structures',[App\Http\Controllers\StructureController::class, 'index']);
Route::get('/display-structure-form',[App\Http\Controllers\StructureController::class, 'create']);
Route::get('/view-structure-detail',[App\Http\Controllers\StructureController::class, 'viewtail']);
Route::post('/save-structure',[App\Http\Controllers\StructureController::class, 'store']);
Route::get('/display-update-structure-form/{id}',[App\Http\Controllers\StructureController::class, 'update']);
Route::post('/update-structure/{id}',[App\Http\Controllers\StructureController::class, 'edit']);
Route::get('/delete-structure/{id}',[App\Http\Controllers\StructureController::class, 'destroy']);





Route::get('/type-agent',[App\Http\Controllers\TypeAgentController::class, 'index']);



Route::get('/fonction',[App\Http\Controllers\FonctionController::class, 'index']);


Route::get('/responsabilite',[App\Http\Controllers\ResponsabiliteController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
