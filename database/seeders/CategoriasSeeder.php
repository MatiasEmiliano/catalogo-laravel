<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasSeeder extends Seeder
{
    public function run()
    {
        $c1= new Categoria;
        $c1->catNombre = 'Smartphone';
        $c1->save();

        $c2= new Categoria;
        $c2->catNombre = 'Cámaras mirorless';
        $c2->save();

        $c3= new Categoria;
        $c3->catNombre = 'Lentes';
        $c3->save();

        $c4= new Categoria;
        $c4->catNombre = 'Parlantes bluetooth';
        $c4->save();

        $c5= new Categoria;
        $c5->catNombre = 'Smart TV';
        $c5->save();

        $c6= new Categoria;
        $c6->catNombre = 'Consolas';
        $c6->save();

        $c7= new Categoria;
        $c7->catNombre = 'Tablets';
        $c7->save();
        
    }
}
