<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\StockController;
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

 
//client
Route::get('/listClients',[ClientController::class, 'index'])->name('listClients'); 
Route::get('/AjouterClient', [ClientController::class,"create"])->name('AjouterClient');
Route::post('/AjouterClient',[ClientController::class,"store"])->name('client.Ajouter');
Route::delete('/delteClient/{id}', [ClientController::class, 'destroy'])->name('delteClients.destroy');
Route::get('/editClient/{id}', [ClientController::class, 'edit'])->name('editClients.edit');
Route::put('/updateClient/{id}', [ClientController::class, 'update'])->name('updateClients.update');
Route::get('/showClient/{id}', [ClientController::class, 'show'])->name('showClients.show');

//finance
Route::get('/Financepage',[FinanceController::class, 'index'])->name('Financepage');
Route::get('/Financedit/{id}',[FinanceController::class,'edit'])->name('Financedit');
Route::put('/Financeupdate/{id}',[FinanceController::class, 'update'])->name('updateFinance');

//stock
Route::get('/Stockpage',[StockController::class, 'index'])->name('Stockpage');
Route::get('/Stockcreate',[StockController::class,'create'])->name('Stockcreate');
Route::post('/Stockcreate',[StockController::class,'store'])->name('Stockcreate.store');
Route::delete('/delteStock/{id}',[StockController::class,'destroy'])->name('delteStock.destroy');
Route::get('/editStock/{id}',[StockController::class,'edit'])->name('editStock.edit');
Route::put('/updateStock/{id}',[StockController::class,'update'])->name('updateStock.update');
Route::get('/editUse/{id}',[StockController::class,'updateUse'])->name('editUse');
Route::get('/AnulereditUse/{id}',[StockController::class,'AnulereditUse'])->name('AnulereditUse');
