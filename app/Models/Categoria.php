<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCategoria'; //Cambia la primaryKey predeterminada 'id' a 'idCategoria', que es el nombre de la columna id de mi tabla
    public $timestamps = false; //desactiva el modo predeterminado de tablas con columnas created y updated.
}
