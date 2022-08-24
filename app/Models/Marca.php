<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $primaryKey = 'idMarca';
    public $timestamps = false; //desactiva el modo predeterminado de tablas con columnas created y updated.
}
