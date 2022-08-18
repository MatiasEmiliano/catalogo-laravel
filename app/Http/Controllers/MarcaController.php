<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index(){
        $marcas=Marca::all();
        return view('marcas',['marcas'=>$marcas]);
    }
}
