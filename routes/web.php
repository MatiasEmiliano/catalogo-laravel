<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

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
//Marcas:
Route::get('/marcas', [MarcaController::class,'index']);
Route::get('/marca/create', [MarcaController::class,'create']);
Route::post('/marca/store', [MarcaController::class,'store']);
Route::get('/marca/edit/{id}',[MarcaController::class,'edit']);
Route::get('/marca/delete/{id}',[MarcaController::class,'delete']);
Route::put('/marca/updated',[MarcaController::class,'updated']);
Route::get('/marca/delete/{id}',[MarcaController::class,'delete']);
Route::delete('/marca/destroy',[MarcaController::class,'destroy']);

//Categorias:
Route::get('/categorias', [CategoriaController::class,'index']);
Route::get('/categoria/create', [CategoriaController::class,'create']);
Route::post('/categoria/store', [CategoriaController::class,'store']);
Route::get('/categoria/edit/{id}',[CategoriaController::class,'edit']);
Route::get('/categoria/delete/{id}',[CategoriaController::class,'delete']);
Route::put('/categoria/updated',[CategoriaController::class,'updated']);
Route::get('/categoria/delete/{id}',[CategoriaController::class,'delete']);
Route::delete('/categoria/destroy',[CategoriaController::class,'destroy']);

//Productos:
Route::get('/productos',[ProductoController::class,'index']);
ROute::get('/producto/create',[ProductoController::class,'create']);
Route::post('/producto/store', [ProductoController::class,'store']);
Route::get('/producto/edit/{id}', [ProductoController::class,'edit']);
Route::put('/producto/update',[ProductoController::class,'update']);
