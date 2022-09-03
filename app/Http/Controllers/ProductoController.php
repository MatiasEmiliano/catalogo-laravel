<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Marca;
use Throwable;


class ProductoController extends Controller
{
    public function index(){
        $productos=Producto::paginate(5);         //PAginador de 3 items + Flechas
        return view('productos',['productos'=>$productos]);
    }

    public function create(){
        $marcas=Marca::all();
        $categorias=Categoria::all();
        return view('productoCreate',['marcas'=>$marcas,'categorias'=>$categorias]);
    }


    public function store(Request $request){

        //Validacion de Form e Imagen:
        $this->validaForm($request);
        $prdImagen = $this->subirImagen($request);

        //Validacion OK:
        try{
            $producto = new Producto;
            $producto->prdNombre = $request->prdNombre;
            $producto->prdPrecio = $request->prdPrecio;
            $producto->prdDescripcion=$request->prdDescripcion;
            $producto->idMarca=$request->idMarca;
            $producto->idCategoria=$request->idCategoria;
            $producto->prdImagen=$prdImagen;
            $producto->prdActivo=1;
            $producto->save();
            return redirect('productos')->with(['mensaje'=>"Producto '{$request->prdNombre}' creada exitosamente",'css'=>'success']);
        }catch(Throwable $th){
            return redirect('productos')->with(['mensaje'=>"Producto '{$request->prdNombre}' no se ha podido crear",'css'=>'danger']);
        }
    }
    private function validaForm($request){
        $request->validate([
                'prdNombre'=>'required|min:3|max:30',
                'prdPrecio' => 'required|numeric|min:0',
                'prdDescripcion'=> 'required|numeric',
                'idMarca'=>'required',
                'idCategoria'=>'required',
                'prdDescripcion'=>'required|min:3|max:150',
                'prdImagen'=>'mimes:png,jpg,jpeg,webp,svg,gif|max:2048'
                ],
                [
                    'prdNombre.required' => 'El campo "Nombre del producto" es obligatorio.',
                    'prdNombre.min'=>'El campo "Nombre del producto" debe tener como mínimo 2 caractéres.',
                    'prdNombre.max'=>'El campo "Nombre" debe tener 30 caractéres como máximo.',
                    'prdNombre.required' => 'El campo "Nombre del producto" es obligatorio.',
                    'prdNombre.min'=>'El campo "Nombre del producto" debe tener como mínimo 2 caractéres.',
                    'prdNombre.max'=>'El campo "Nombre" debe tener 30 caractéres como máximo.',
                    'prdPrecio.required'=>'Complete el campo Precio.',
                    'prdPrecio.numeric'=>'Complete el campo Precio con un número.',
                    'prdPrecio.min'=>'Complete el campo Precio con un número mayor a 0.',
                    'idMarca.required'=>'Seleccione una marca.',
                    'idCategoria.required'=>'Seleccione una categoría.',
                    'prdDescripcion.required'=>'Complete el campo Descripción.',
                    'prdDescripcion.min'=>'Complete el campo Descripción con al menos 3 caractéres',
                    'prdDescripcion.max'=>'Complete el campo Descripción con 150 caractéres como máxino.',
                    'prdImagen.mimes'=>'Debe ser una imagen.',
                    'prdImagen.max'=>'Debe ser una imagen de 2MB como máximo.'
            ]);
    }

    private function subirImagen(Request $request){
        $prdImagen = 'noDisponible.png';

        if($request->has('imgActual')){ //Caso en venir de Modificar;
            $prdImagen = $request->imgActual; 
        }

        // //Opc. 1 (PHP puro):
        // if($_FILES['prdImagen']['error']==0){
        //     $prdImagen = $_FILES['prdImagen']['name'];
        // }

        //Opc. 2: (con $request):
        if($request->file('prdImagen')){
            //$prdImagen = $request->file(key:'prdImagen')->getFilename(); //nombre temporal
            //Lo renombramos para que no coincida con otro:
            $archivo=$request->file('prdImagen');
            $ext = $archivo->getClientOriginalExtension();
            $prdImagen = time().'.'.$ext;
            $archivo->move(public_path('imagenes/productos'),$prdImagen);//Lo subimos renombrado
        }
        return $prdImagen;
    }

    public function edit($id){
        $producto = Producto::find($id);
        $marcas=Marca::all();
        $categorias=Categoria::all();
        return view('productoEdit',['producto'=>$producto,'marcas'=>$marcas,'categorias'=>$categorias]);
    }

    public function update(Request $request){
        $this->validaForm($request);
        $prdImagen = $this->subirImagen($request);

        try{
            $producto = Producto::find($request->idProducto);
            $producto->prdNombre = $request->prdNombre;
            $producto->prdPrecio = $request->prdPrecio;
            $producto->prdDescripcion=$request->prdDescripcion;
            $producto->idMarca=$request->idMarca;
            $producto->idCategoria=$request->idCategoria;
            $producto->prdImagen=$prdImagen;
            $producto->prdActivo=1;
            $producto->save();
            return redirect('productos')->with(['mensaje'=>"Producto '{$request->prdNombre}' modificado exitosamente",'css'=>'success']);
        }catch(Throwable $th){
            return redirect('productos')->with(['mensaje'=>"Producto '{$request->prdNombre}' no se ha podido modificar",'css'=>'danger']);
        }  
    }

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
