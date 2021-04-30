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
// url for manage type structure
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
Route::post('/save-type-structure',[App\Http\Controllers\TypeStructureController::class, 'store']);
Route::post('/update-type-structure',[App\Http\Controllers\TypeStructureController::class, 'edit']);
Route::get('/delete-type-structure/{id}',[App\Http\Controllers\TypeStructureController::class, 'destroy']);

//Type véhicule
Route::get('/type-vehicule',[App\Http\Controllers\TypeVehiculeController::class, 'index']);
Route::post('/save-type-vehicule',[App\Http\Controllers\TypeVehiculeController::class, 'store']);
Route::post('/update-type-vehicule',[App\Http\Controllers\TypeVehiculeController::class, 'edit']);
Route::get('/delete-type-vehicule/{id}',[App\Http\Controllers\TypeVehiculeController::class, 'destroy']);

//Véhicule
Route::get('/vehicule',[App\Http\Controllers\VehiculeController::class, 'index']);
Route::post('/save-vehicule',[App\Http\Controllers\VehiculeController::class, 'store']);
Route::post('/update-vehicule',[App\Http\Controllers\VehiculeController::class, 'edit']);
Route::get('/delete-vehicule/{id}',[App\Http\Controllers\VehiculeController::class, 'destroy']);

// url for structure
Route::get('/structures',[App\Http\Controllers\StructureController::class, 'index']);
Route::get('/display-structure-form',[App\Http\Controllers\StructureController::class, 'create']);
Route::get('/view-structure-detail',[App\Http\Controllers\StructureController::class, 'viewtail']);
Route::post('/save-structure',[App\Http\Controllers\StructureController::class, 'store']);
Route::get('/display-update-structure-form/{id}',[App\Http\Controllers\StructureController::class, 'update']);
Route::post('/update-structure/{id}',[App\Http\Controllers\StructureController::class, 'edit']);
Route::get('/delete-structure/{id}',[App\Http\Controllers\StructureController::class, 'destroy']);


Route::get('/fonction',[App\Http\Controllers\FonctionController::class, 'index']);
Route::post('/save-fonction',[App\Http\Controllers\FonctionController::class, 'store']);
Route::post('/update-fonction',[App\Http\Controllers\FonctionController::class, 'edit']);
Route::get('/delete-fonction/{id}',[App\Http\Controllers\FonctionController::class, 'destroy']);



Route::get('/responsabilite',[App\Http\Controllers\ResponsabiliteController::class, 'index']);
Route::get('/delete-responsabilite/{id}',[App\Http\Controllers\ResponsabiliteController::class, 'destroy']);
Route::post('/save-responsabilite',[App\Http\Controllers\ResponsabiliteController::class, 'store']);
Route::post('/update-responsabilite',[App\Http\Controllers\ResponsabiliteController::class, 'edit']);


Route::get('/type-agent',[App\Http\Controllers\TypeAgentController::class, 'index']);
Route::post('/save-typeagent',[App\Http\Controllers\TypeAgentController::class, 'store']);
Route::post('/update-typeagent',[App\Http\Controllers\TypeAgentController::class, 'edit']);
Route::get('/delete-typeagent/{id}',[App\Http\Controllers\TypeAgentController::class, 'destroy']);


Route::get('/agents',[App\Http\Controllers\AgentController::class, 'index']);
Route::post('/save-agent',[App\Http\Controllers\AgentController::class, 'store']);
Route::post('/save-affectation',[App\Http\Controllers\AgentController::class, 'saveaffectation']);
Route::get('/delete-agent/{id}',[App\Http\Controllers\AgentController::class, 'destroy']);


Route::get('/source-financement',[App\Http\Controllers\SourceFinancementController::class, 'index']);
Route::post('/save-source-financement',[App\Http\Controllers\SourceFinancementController::class, 'store']);
Route::post('/update-source-financement',[App\Http\Controllers\SourceFinancementController::class, 'edit']);
Route::get('/delete-source-financement/{id}',[App\Http\Controllers\SourceFinancementController::class, 'destroy']);

Route::get('/signataire',[App\Http\Controllers\SignatureController::class, 'index']);
Route::get('/display-signataire-form',[App\Http\Controllers\SignatureController::class, 'create']);
Route::get('/get-signataire',[App\Http\Controllers\SignatureController::class, 'getsignatairebystructure']);
Route::get('/get-signatairebyone',[App\Http\Controllers\SignatureController::class, 'getsignatairebysignataireone']);
Route::get('/get-signatairebytwo',[App\Http\Controllers\SignatureController::class, 'getsignatairebysignatairetwo']);

Route::post('/save-signature',[App\Http\Controllers\SignatureController::class, 'store']);


Route::get('/missioninterne',[App\Http\Controllers\MissioninterneController::class, 'index'])->name('missioninterne');


Route::post('/filter-structure',[App\Http\Controllers\MissioninterneController::class, 'filterstructure']);
Route::post('/filter-province',[App\Http\Controllers\MissioninterneController::class, 'filterprovince']);
Route::post('/filter-commune',[App\Http\Controllers\MissioninterneController::class, 'filtercommune']);
Route::get('/filter-agent-mission',[App\Http\Controllers\MissioninterneController::class, 'filteragent']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
