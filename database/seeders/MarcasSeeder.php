<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m1= new Marca;
        $m1->mkNombre = 'Nikonia';
        $m1->save();

        $m2= new Marca;
        $m2->mkNombre = 'Apple';
        $m2->save();

        $m3= new Marca;
        $m3->mkNombre = 'Marshall';
        $m3->save();

        $m4= new Marca;
        $m4->mkNombre = 'Samsung';
        $m4->save();

        $m5= new Marca;
        $m5->mkNombre = 'Huawei';
        $m5->save();

        $m6= new Marca;
        $m6->mkNombre = 'Audiotech';
        $m6->save();

        $m7= new Marca;
        $m7->mkNombre = 'Nikonia';
        $m7->save();
    }
}
