@extends('layouts.plantilla')
@section('contenido')

    <h1>Panel de administración de Categorias</h1>

    @if( session('mensaje') )
        <div class="alert alert-{{session('css')}}">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="row my-3 d-flex justify-content-between">
        <div class="col">
            <a href="/dashboard" class="btn btn-outline-secondary">
                Dashboard
            </a>
        </div>
        <div class="col text-end">
            <a href="categoria/create" class="btn btn-outline-secondary">
                <i class="bi bi-plus-square"></i>
                Agregar
            </a>
        </div>
    </div>


    <ul class="list-group">
        @foreach($categorias as $categoria)
        <li class="col-md-6 list-group-item list-group-item-action d-flex justify-content-between">
            <div class="col">
                <span class="fs-4">{{$categoria->catNombre}}</span>
            </div>
            <div class="col text-end btn-group">
                <a href="/categoria/edit/{{$categoria->idCategoria}}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-pencil-square"></i>
                    Modificar
                </a>
                <a href="/categoria/delete/{{$categoria->idCategoria}}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-trash"></i>
                    &nbsp;Eliminar&nbsp;
                </a>
            </div>
        </li>
        @endforeach


    </ul>
    {{ $categorias->links() }}

@endsection