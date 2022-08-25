<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Throwable;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index(){
        //$marcas=Marca::all();
        //$marcas=Marca::simplePaginate(3); //Paginador de 3 items
        $categorias=Categoria::paginate(3);         //PAginador de 3 items + Flechas
        return view('categorias',['categorias'=>$categorias]);
    }


    public function create(){
        return view('categoriaCreate');
    }


    public function store(Request $request){
        $this->validaForm($request);
        //Validacion OK:
        
        try{
            $categoria = new Categoria;
            $categoria->catNombre = $request->catNombre;
            $categoria->save();
            return redirect('categorias')->with(['mensaje'=>"Categoria '{$request->catNombre}' creada exitosamente",'css'=>'success']);
        }catch(Throwable $th){
            return redirect('categorias')->with(['mensaje'=>"Categoria '{$request->catNombre}' no se ha podido crear",'css'=>'danger']);
        }
    }
    private function validaForm($request){
        $request->validate(['catNombre'=>'required|unique:categorias|min:3|max:10'],
            ['catNombre.required'=>'Este campo es obligatorio',
            'catNombre.unique'=>'Esta marca ya existe',
            'catNombre.min'=>'Este campo tiene un minimo de 3 caracteres',
            'catNombre.max'=>'Este campo un maximo de 10 caracteres']);
    }

    public function edit($id){
        $categoria = Categoria::find($id);
        return view('categoriaEdit',['categoria'=>$categoria]);
    }

    public function updated(Request $request){
        $this->validaForm($request);
        try{
            $categoria = Categoria::find($request->idCategoria);
            $categoria->catNombre=$request->catNombre;
            $categoria->save();
            return redirect('categorias')->with(['mensaje'=>"Categoria '{$request->catNombre}' modificada exitosamente",'css'=>'success']);
        }catch(Throwable $th){
            return redirect('categorias')->with(['mensaje'=>"Categoria '{$request->catNombre}' no se ha podido modificar",'css'=>'danger']);
        }  
    }

    public function delete($id){
        $categoria = Categoria::find($id);
        $prd = DB::select('SELECT * FROM productos WHERE idCategoria = :idCategoria', [$id]);
        if($prd){
            return redirect('categorias')->with(['mensaje'=>'No se puede eliminar una categoria en la que existen productos','css'=>'danger']);
        }else{
            return view('categoriaDelete',['categoria'=>$categoria]);
        }  
    }

    public function destroy(Request $request){
        try{
           $categoria = Categoria::find($request->idCategoria);
           $categoria->delete();
           return redirect('categorias')->with(['mensaje'=>'Categoria Eliminada Correctamente','css'=>'success']); 
        }catch(Throwable $th){
           return redirect('categorias')->with(['mensaje'=>'No se pudo eliminar esa categoria','css'=>'danger']);
        }    
    }
}
