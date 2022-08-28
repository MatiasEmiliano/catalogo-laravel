<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProducto'; //Cambia la primaryKey predeterminada 'id' a 'idMarca', que es el nombre de la columna id de mi tabla
    public $timestamps = false; //desactiva el modo predeterminado de tablas con columnas created y updated.
}
