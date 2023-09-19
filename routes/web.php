<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FinanceController;
use App\Models\Finance;
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


Route::get('/listClients',[ClientController::class, 'index'])->name('listClients'); 
Route::get('/AjouterClient', [ClientController::class,"create"])->name('AjouterClient');
Route::post('/AjouterClient',[ClientController::class,"store"])->name('client.Ajouter');
Route::delete('/delteClient/{id}', [ClientController::class, 'destroy'])->name('delteClients.destroy');
Route::get('/editClient/{id}', [ClientController::class, 'edit'])->name('editClients.edit');
Route::put('/updateClient/{id}', [ClientController::class, 'update'])->name('updateClients.update');
Route::get('/showClient/{id}', [ClientController::class, 'show'])->name('showClients.show');

Route::get('/Financepage',[FinanceController::class, 'index'])->name('Financepage');
Route::get('/Financedit/{id}',[FinanceController::class,'edit'])->name('Financedit');
Route::put('/Financeupdate/{id}',[FinanceController::class, 'update'])->name('updateFinance');
