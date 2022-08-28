<?php

namespace Database\Seeders;

use Database\Seeders\MarcasSeeder;
use Database\Seeders\CategoriasSeeder;
use Database\Seeders\ProductosSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(MarcasSeeder::class);
       $this->call(CategoriasSeeder::class);
       $this->call(ProductosSeeder::class);
    }
}
