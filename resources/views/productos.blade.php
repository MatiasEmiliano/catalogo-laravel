@extends('layouts.plantilla')
@section('contenido')

    <h1>Panel de administración de productos</h1>

    @if( session('mensaje') )
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="row my-3 text-start">
        <div class="col-11">
            <a href="" class="btn btn-outline-secondary">
                Dashboard
            </a>
        </div>
        <div class="col-1 text-end">
            <a href="" class="btn btn-outline-secondary">
                <i class="bi bi-plus-square"></i>
                Agregar
            </a>
        </div>
    </div>

    @foreach ($productos as $producto)
    <div class="row mt-3">
        <figure class="col-3">
            <img src="/imagenes/productos/{{$producto->prdImagen}}" class="img-thumbnail">
        </figure>
        <div class="col-8">
            <h2>Nombre</h2>
            <span class="precio3">{{$producto->prdPRecio}}</span>
            <p>
                Marca: {{$producto->idMarca}} <br>
                Categoría: {{$producto->idCategoria}} <br>
                {{$producto->prdDescripcion}}
            </p>
        </div>
        <div class="col-1 d-grid d-md-block">
            <a href="" class="btn btn-outline-secondary me-1">
                <i class="bi bi-pencil-square"></i>
                Modificar
            </a>
            <a href="" class="btn btn-outline-secondary me-1">
                <i class="bi bi-trash"></i>
                &nbsp;Eliminar&nbsp;
            </a>
        </div>
    </div>
    @endforeach

    {{ $productos->links() }}


@endsection
