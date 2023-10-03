<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\StockController;
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

//login 
Route::get('/',[CustomAuthController::class,'login'])->name('login');
Route::get('/login',[CustomAuthController::class,'login'])->name('login');

Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('loginUser');

Route::get('/registration',[CustomAuthController::class,'registration'])->name('registration')->middleware('AuthCheck');

Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('registerUser')->middleware('AuthCheck');

Route::delete('/deleteUser/{id}', [CustomAuthController::class,'deleteUser'])->name('deleteUser')->middleware('AuthCheck');

//home
Route::get('/Accueil', function () {
    $countStocks = \App\Models\Stock::where('use', 0)->count();
    return view('Home', compact('countStocks'));
})->name('Accueil')->middleware('AuthCheck');

//client
Route::get('/listClients',[ClientController::class, 'index'])->name('listClients')->middleware('AuthCheck'); 
Route::get('/AjouterClient', [ClientController::class,"create"])->name('AjouterClient')->middleware('AuthCheck');
Route::post('/AjouterClient',[ClientController::class,"store"])->name('client.Ajouter')->middleware('AuthCheck');
Route::delete('/delteClient/{id}', [ClientController::class, 'destroy'])->name('delteClients.destroy')->middleware('AuthCheck');
Route::get('/editClient/{id}', [ClientController::class, 'edit'])->name('editClients.edit')->middleware('AuthCheck');
Route::put('/updateClient/{id}', [ClientController::class, 'update'])->name('updateClients.update')->middleware('AuthCheck');
Route::get('/showClient/{id}', [ClientController::class, 'show'])->name('showClients.show')->middleware('AuthCheck');

//finance
Route::get('/Financepage',[FinanceController::class, 'index'])->name('Financepage')->middleware('AuthCheck');
Route::get('/Financedit/{id}',[FinanceController::class,'edit'])->name('Financedit')->middleware('AuthCheck');
Route::put('/Financeupdate/{id}',[FinanceController::class, 'update'])->name('updateFinance')->middleware('AuthCheck');

//stock
Route::get('/Stockpage',[StockController::class, 'index'])->name('Stockpage')->middleware('AuthCheck');
Route::get('/Stockcreate',[StockController::class,'create'])->name('Stockcreate')->middleware('AuthCheck');
Route::post('/Stockcreate',[StockController::class,'store'])->name('Stockcreate.store')->middleware('AuthCheck');
Route::delete('/delteStock/{id}',[StockController::class,'destroy'])->name('delteStock.destroy')->middleware('AuthCheck');
Route::get('/editStock/{id}',[StockController::class,'edit'])->name('editStock.edit')->middleware('AuthCheck');
Route::put('/updateStock/{id}',[StockController::class,'update'])->name('updateStock.update')->middleware('AuthCheck');
Route::get('/editUse/{id}',[StockController::class,'updateUse'])->name('editUse')->middleware('AuthCheck');
Route::get('/AnulereditUse/{id}',[StockController::class,'AnulereditUse'])->name('AnulereditUse')->middleware('AuthCheck');

//client fidèle
Route::get('/ClientFidele',[ClientController::class,'fidele'])->name('ClientFidele')->middleware('AuthCheck');
Route::get('/updateFidele/{id}',[ClientController::class,'updateFidele'])->name('updateFidele')->middleware('AuthCheck');
Route::get('/AnulerFidele/{id}',[ClientController::class,'AnulerFidele'])->name('AnulerFidele')->middleware('AuthCheck');

