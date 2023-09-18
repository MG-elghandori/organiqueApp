<?php

use App\Http\Controllers\AjouterClientController;
use App\Http\Controllers\ListClientController;
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
    return view('Home');
});

Route::get('/Accueil',function(){
    return view('Home');
 })->name('Accueil');

Route::get('/AjouterClient', [AjouterClientController::class,"index"])->name('AjouterClient');
Route::post('/AjouterClient',[AjouterClientController::class,"create"])->name('client.Ajouter');


Route::get('/listClients',[ListClientController::class,"index"])->name('listClients'); 