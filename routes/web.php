<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;

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

Route::get('/marcas', [MarcaController::class,'index']);
Route::get('/marca/create', [MarcaController::class,'create']);
Route::post('/marca/store', [MarcaController::class,'store']);
Route::get('/marca/edit/{id}',[MarcaController::class,'edit']);
Route::get('/marca/delete/{id}',[MarcaController::class,'delete']);
