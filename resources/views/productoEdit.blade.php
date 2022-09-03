@extends('layouts.plantilla')
@section('contenido')

    <h1>Edicion de un nuevo producto</h1>

    <div class="alert p-4 col-8 mx-auto shadow">
        <form action="/producto/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group mb-4">
                <label for="prdNombre">Nombre del Producto</label>
                <input type="text" name="prdNombre"
                       class="form-control" id="prdNombre" value="{{$producto->prdNombre}}">
            </div>

            <label for="prdPrecio">Precio del Producto</label>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text">$</div>
                </div>
                <input type="number" name="prdPrecio"
                       class="form-control" id="prdPrecio" min="0" step="0.01" value="{{$producto->prdPrecio}}">
            </div>

            <div class="form-group mb-4">
                <label for="idMarca">Marca</label>
                <select class="form-select" name="idMarca" id="idMarca">
                    <option value="">Seleccione una marca</option>
                    @foreach ($marcas as $marca)
                    <option {{$producto->idMarca==$marca->idMarca ? 'selected' : ''}} value="{{$marca->idMarca}}">{{$marca->mkNombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="idCategoria">Categoría</label>
                <select class="form-select" name="idCategoria" id="idCategoria">
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                    <option @selected($producto->idCategoria==$categoria->idCategoria) value="{{$categoria->idCategoria}}">{{$categoria->catNombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="prdDescripcion">Descripción del Producto</label>
                <textarea name="prdDescripcion" class="form-control" id="prdDescripcion">{{$producto->prdDescripcion}}</textarea>
            </div>

            <div class="custom-file mt-1 mb-4">
                <input type="file" name="prdImagen"  class="custom-file-input" id="customFileLang" lang="es">
                <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco">Seleccionar Archivo: </label>
            </div>

            <div>
                Imagen actual:
                <figure class="d-flex justify-content-center">
                    <img src="/imagenes/productos/{{$producto->prdImagen}}" alt="" class="img-thumbnail">
                </figure>
            </div>

            <input type="hidden" name='idProducto' value='{{$producto->idProducto}}'>
            <input type="hidden" name='imgActual' value='{{$producto->prdImagen}}'>

            <button class="btn btn-dark mr-3 px-4">Modificar producto</button>
            <a href="adminProductos.php" class="btn btn-outline-secondary">
                Volver a panel de productos
            </a>

        </form>
    </div>

    @if( $errors->any() )
        <div class="alert alert-danger p-4 col-8 mx-auto">
            <ul>
                @foreach( $errors->all() as $error )
                    <li>
                        <i class="bi bi-exclamation-triangle"></i>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
