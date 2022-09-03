<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\Categoria;


class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProducto'; //Cambia la primaryKey predeterminada 'id' a 'idMarca', que es el nombre de la columna id de mi tabla
    public $timestamps = false; //desactiva el modo predeterminado de tablas con columnas created y updated.

    public function getMarca(){ //Funcion para mostrar la marca en el html.
        return $this->belongsTo(Marca::class, 'idMarca', 'idMarca');
    }

    public function getCategoria(){ //Funcion para mostrar la categoria en el html.
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }
}
