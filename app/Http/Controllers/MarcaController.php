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
    public function create(){
        return view('marcaCreate');
    }
    public function store(Request $request){
        $this->validaForm($request);
        //Validacion OK:
        try{
            $marca = new Marca;
            $marca->mkNombre = $request->mkNombre;
            $marca->save();
            return redirect('marcas')->with(['mensaje'=>"Marca '{$request->mkNombre}' creada exitosamente",'css'=>'success']);
        }catch(throwable $th){
            return redirect('marcas')->with(['mensaje'=>"Marca '{$request->mkNombre}' no se ha podido crear",'css'=>'danger']);
        }
    }
    private function validaForm($request){
        $request->validate(['mkNombre'=>'required|unique:marcas|min:3|max:10']);
    }
}
