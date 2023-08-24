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
Route::get(
    '/',
    [App\Http\Controllers\EntrepriseController::class, 'adlogout']
)->name('connect');

Route::get(
    'adlogout',
    [App\Http\Controllers\EntrepriseController::class, 'adlogout']
)->name('adlogout');

Route::get(
    'dashboard',
    [App\Http\Controllers\EntrepriseController::class, 'dashboard']
)->name('dashboard');


Route::get(
    'configuration',
    [App\Http\Controllers\EntrepriseController::class, 'index']
)->name('configuration');


//----//
//Route::resource('entreprises', EntrepriseController::class);

Route::get(
    'entreprise',
    [App\Http\Controllers\EntrepriseController::class, 'index']
)->name('entreprise');

Route::get(
    'entrepriseadd',
    [App\Http\Controllers\EntrepriseController::class, 'store']
)->name('entrepriseadd');

Route::get(
    'entrepriseupdate',
    [App\Http\Controllers\EntrepriseController::class, 'update']
)->name('entrepriseupdate');

//----//
Route::get(
    'region',
    [App\Http\Controllers\RegionController::class, 'index']
)->name('region');

Route::get(
    'regionadd',
    [App\Http\Controllers\RegionController::class, 'store']
)->name('regionadd');

Route::get(
    'regionupdate',
    [App\Http\Controllers\RegionController::class, 'update']
)->name('regionupdate');

//----//
Route::get(
    'section',
    [App\Http\Controllers\SectionController::class, 'index']
)->name('section');

Route::get(
    'sectionadd',
    [App\Http\Controllers\SectionController::class, 'store']
)->name('sectionadd');

Route::get(
    'sectionupdate',
    [App\Http\Controllers\SectionController::class, 'update']
)->name('sectionupdate');

//----//
Route::get(
    'gerant',
    [App\Http\Controllers\GerantController::class, 'index']
)->name('gerant');

Route::get(
    'gerantadd',
    [App\Http\Controllers\GerantController::class, 'store']
)->name('gerantadd');

Route::get(
    'gerantupdate',
    [App\Http\Controllers\GerantController::class, 'update']
)->name('gerantupdate');

Route::get(
    'gerantupdate2',
    [App\Http\Controllers\GerantController::class, 'update2']
)->name('gerantupdate2');

//----//
Route::get(
    'exercice',
    [App\Http\Controllers\ExerciceController::class, 'index']
)->name('exercice');

Route::get(
    'exerciceadd',
    [App\Http\Controllers\ExerciceController::class, 'store']
)->name('exerciceadd');

Route::get(
    'exerciceupdate',
    [App\Http\Controllers\ExerciceController::class, 'update']
)->name('exerciceupdate');

//----//
Route::get(
    'droitadhesion',
    [App\Http\Controllers\CotisationadhController::class, 'index']
)->name('droitadhesion');

Route::get(
    'droitadhesionadd',
    [App\Http\Controllers\CotisationadhController::class, 'store']
)->name('droitadhesionadd');

Route::get(
    'droitadhesionupdate',
    [App\Http\Controllers\CotisationadhController::class, 'update']
)->name('droitadhesionupdate');

//----//
Route::get(
    'droitannuel',
    [App\Http\Controllers\CotisationanController::class, 'index']
)->name('droitannuel');

Route::get(
    'droitannueladd',
    [App\Http\Controllers\CotisationanController::class, 'store']
)->name('droitannueladd');

Route::get(
    'droitannuelupdate',
    [App\Http\Controllers\CotisationanController::class, 'update']
)->name('droitannuelupdate');

//----//
Route::get(
    'droitmensuel',
    [App\Http\Controllers\CotisationmenController::class, 'index']
)->name('droitmensuel');

Route::get(
    'droitmensueladd',
    [App\Http\Controllers\CotisationmenController::class, 'store']
)->name('droitmensueladd');

Route::get(
    'droitmensuelupdate',
    [App\Http\Controllers\CotisationmenController::class, 'update']
)->name('droitmensuelupdate');


//----//
Route::get(
    'adhtuteur',
    [App\Http\Controllers\AdhtuteurController::class, 'index']
)->name('adhtuteur');

Route::get(
    'adhtuteuradd',
    [App\Http\Controllers\AdhtuteurController::class, 'store']
)->name('adhtuteuradd');

Route::get(
    'adhtuteurupdate',
    [App\Http\Controllers\AdhtuteurController::class, 'update']
)->name('adhtuteurupdate');

//----//
Route::get(
    'adhbeneficiaire',
    [App\Http\Controllers\AdhbeneficiaireController::class, 'index']
)->name('adhbeneficiaire');

Route::get(
    'adhbeneficiaireadd',
    [App\Http\Controllers\AdhbeneficiaireController::class, 'store']
)->name('adhbeneficiaireadd');

Route::get(
    'adhbeneficiaireupdate',
    [App\Http\Controllers\AdhbeneficiaireController::class, 'update']
)->name('adhbeneficiaireupdate');

//----//
Route::get(
    'adhenfant',
    [App\Http\Controllers\AdhenfantController::class, 'index']
)->name('adhenfant');

Route::get(
    'adhenfantadd',
    [App\Http\Controllers\AdhenfantController::class, 'store']
)->name('adhenfantadd');

Route::get(
    'adhenfantupdate',
    [App\Http\Controllers\AdhenfantController::class, 'update']
)->name('adhenfantupdate');

//----//
Route::get(
    'droitsoutien',
    [App\Http\Controllers\SoutienController::class, 'index']
)->name('droitsoutien');

Route::get(
    'droitsoutienadd',
    [App\Http\Controllers\SoutienController::class, 'store']
)->name('droitsoutienadd');

Route::get(
    'droitsoutienupdate',
    [App\Http\Controllers\SoutienController::class, 'update']
)->name('droitsoutienupdate');





Route::get('/adherant', function () {
    return view('rg_admin.adherant');
});

Route::get('/tuteur', function () {
    return view('rg_admin.tuteur');
});

Route::get('/beneficiaire', function () {
    return view('rg_admin.beneficiaire');
});

Route::get('/inscription', function () {
    return view('rg_admin.inscription');
});
