<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $p1=new Producto;
            $p1->prdNombre='Nikon Z6';
            $p1->prdPrecio=1650.00;
            $p1->idMarca=1;
            $p1->idCategoria=2;
            $p1->prdDescripcion='Cuerpo de cámara sin espejo formato full frame. Resolución 24.5 MPX. Bluetooth, Wi-Fi, GPS. ISO 100-51200';
            $p1->prdImagen='nikon-z6.jpg';
            $p1->prdActivo=1;
            $p1->save();

            $p2=new Producto;
            $p2->prdNombre='iPhone 12 Pro (256GB) gold';
            $p2->prdPrecio=1200.00;
            $p2->idMarca=2;
            $p2->idCategoria=1;
            $p2->prdDescripcion='Apple iPhone 12 Pro de 256GB color dorado, libre de carrier.';
            $p2->prdImagen='iphone-12-pro-gold.png';
            $p2->prdActivo=1;
            $p2->save();

            $p3=new Producto;
            $p3->prdNombre='Marshall Acton II';
            $p3->prdPrecio=300.00;
            $p3->idMarca=4;
            $p3->idCategoria=4;
            $p3->prdDescripcion='Altavoz inalámbrico Marshall Acton II. Wi-Fi y Bluetooth multihabitación color negro.';
            $p3->prdImagen='marshall-acton.jpg';
            $p3->prdActivo=1;
            $p3->save();

            $p4=new Producto;
            $p4->prdNombre='Homepod Mini';
            $p4->prdPrecio=99.00;
            $p4->idMarca=2;
            $p4->idCategoria=4;
            $p4->prdDescripcion='Altavoz inteligente inalámbrico. Compatible con Siri. Wifi, Bluetooth. Compatible con multihabitación.';
            $p4->prdImagen='homepod-mini.jpg';
            $p4->prdActivo=1;
            $p4->save();

            $p5=new Producto;
            $p5->prdNombre='Samsung Class QLED Q80T Series';
            $p5->prdPrecio=1200.00;
            $p5->idMarca=5;
            $p5->idCategoria=5;
            $p5->prdDescripcion='Smart TV Samsung Class QLED Q80T Series, 65\", 4K, UHD';
            $p5->prdImagen='Q80T.jpg';
            $p5->prdActivo=1;
            $p5->save();

            $p6=new Producto;
            $p6->prdNombre='P40 Pro Plus 512GB';
            $p6->prdPrecio=1250.00;
            $p6->idMarca=6;
            $p6->idCategoria=1;
            $p6->prdDescripcion='Smartphone Huawei P40 Pro Plus 5G 512GB';
            $p6->prdImagen='P40-pro-plus.jpg';
            $p6->prdActivo=1;
            $p6->save();
    }
}
