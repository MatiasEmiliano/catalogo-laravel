<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos=Producto::paginate(3);         //PAginador de 3 items + Flechas
        return view('productos',['productos'=>$productos]);
    }

    // public function create(){
    //     return view('marcaCreate');
    // }


    // public function store(Request $request){
    //     $this->validaForm($request);
    //     //Validacion OK:
    //     try{
    //         $marca = new Marca;
    //         $marca->mkNombre = $request->mkNombre;
    //         $marca->save();
    //         return redirect('marcas')->with(['mensaje'=>"Marca '{$request->mkNombre}' creada exitosamente",'css'=>'success']);
    //     }catch(Throwable $th){
    //         return redirect('marcas')->with(['mensaje'=>"Marca '{$request->mkNombre}' no se ha podido crear",'css'=>'danger']);
    //     }
    // }
    // private function validaForm($request){
    //     $request->validate(['mkNombre'=>'required|unique:marcas|min:3|max:10'],
    //         ['mkNombre.required'=>'Este campo es obligatorio',
    //         'mkNombre.unique'=>'Esta marca ya existe',
    //         'mkNombre.min'=>'Este campo tiene un minimo de 3 caracteres',
    //         'mkNombre.max'=>'Este campo un maximo de 10 caracteres']);
    // }

    // public function edit($id){
    //     $marca = Marca::find($id);
    //     return view('marcaEdit',['marca'=>$marca]);
    // }

    // public function updated(Request $request){
    //     $this->validaForm($request);
    //     try{
    //         $marca = Marca::find($request->idMarca);
    //         $marca->mkNombre=$request->mkNombre;
    //         $marca->save();
    //         return redirect('marcas')->with(['mensaje'=>"Marca '{$request->mkNombre}' modificada exitosamente",'css'=>'success']);
    //     }catch(Throwable $th){
    //         return redirect('marcas')->with(['mensaje'=>"Marca '{$request->mkNombre}' no se ha podido modificar",'css'=>'danger']);
    //     }  
    // }

    // public function delete($id){
    //     $marca = Marca::find($id);
    //     if($this->checkProducto($id)==0){
    //         return view('marcaDelete',['marca'=>$marca]);
    //     }else{
    //         return redirect('marcas')->with(['mensaje'=>'No se puede eliminar una marca en la que existen productos','css'=>'danger']);
    //     }
    // }

    // public function destroy(Request $request){
    //     try{
    //        $marca = Marca::find($request->idMarca);
    //        $marca->delete();
    //        return redirect('marcas')->with(['mensaje'=>'Marca Eliminada Correctamente','css'=>'success']); 
    //     }catch(Throwable $th){
    //        return redirect('marcas')->with(['mensaje'=>'No se pudo eliminar esa marca','css'=>'danger']);
    //     }    
    // }

    // private function checkProducto($id){
    //     $cantidad=Producto::where('idMarca',$id)->count();
    //     return $cantidad;
    // }
}
