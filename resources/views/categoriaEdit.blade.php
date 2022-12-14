@extends('layouts.plantilla')
@section('contenido')

    <h1>Modificación de una Categoria</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form action="/categoria/updated" method="post">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="catNombre">Nombre de la Categoria</label>
                <input type="text" name="catNombre"
                       value="{{old('catNombre',$categoria->catNombre)}}"
                       class="form-control" id="catNombre">
            </div>
            <input type='hidden' value='{{$categoria->idCategoria}}' name='idCategoria'>

            <button class="btn btn-dark my-3 px-4">Modificar Categoria</button>
            <a href="/categorias" class="btn btn-outline-secondary">
                Volver a panel de categorias
            </a>
        </form>
    </div>

    @if( $errors->any() )
        <div class="alert alert-danger col-8 mx-auto">
            <ul>
                @foreach( $errors->all() as $error )
                    <li><i class="bi bi-info-circle"></i>
                        {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection
