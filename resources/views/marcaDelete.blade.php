@extends('layouts.plantilla')
@section('contenido')

    <h1>Baja de una marca</h1>

    <div class="alert alert-danger col-6 mx-auto p-4">

        Se eliminará la marca:
        <span class="lead">
                {{$marca->mkNombre}}
            </span>
        <form action="/marca/destroy" method="post">

            @csrf
            <input type="hidden" name="mkNombre"
                   value="{{$marca->mkNombre}}">
            <input type="hidden" name="idMarca"
                   value="{{$marca->idMarca}}">
            <button class="btn btn-danger btn-block my-3">
                Confirmar baja
            </button>
            <a href="/marcas" class="btn btn-light btn-block">
                volver a panel
            </a>
        </form>
    </div>


@endsection