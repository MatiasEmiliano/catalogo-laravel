<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idProducto');
            $table->text('prdNombre');
            $table->double('prdPrecio',8,2);
            $table->bigInteger('idMarca')->unsigned();
            $table->bigInteger('idCategoria')->unsigned();
            $table->text('prdDescripcion');
            $table->text('prdImagen');
            $table->tinyInteger('prdActivo');
        });

        //Agrega Foreing Key:
        DB::statement('ALTER TABLE `productos` ADD CONSTRAINT `productos_idmarca_foreign` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`idMarca`)');
        DB::statement('ALTER TABLE `productos` ADD CONSTRAINT `productos_idCategoria_foreign` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
