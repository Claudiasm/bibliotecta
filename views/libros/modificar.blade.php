@extends('layouts.main') 
@section('contenido')

<div class="container mt-5">
    <h2 class="text-center">Editar libro</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="nombre">Titulo:</label>
                <input type="text" name="titulo" value='{{ $datos["titulo"] }}'>
            </div>
            <div class="custom-control custom-radio">
                Disponibles:
                <br>
                @if ($datos["disponible"] == 1)
                    <input type="radio" name="disponible" value="1" checked> Si<br>
                    <input type="radio" name="disponible" value="0"> No<br>
                @else
                    <input type="radio" name="disponible" value="1"> Si<br>
                    <input type="radio" name="disponible" value="0" checked> No<br>
                @endif
            </div>
            <div class="col-md-3 mb-3">
                Portada nueva:
                <input name="portada" type="file"/><br> 
            </div>
            <div class="col-md-3 mb-3">
                Editorial:
                <select name="id_editorial" id="">
                    @foreach ($editoriales as $editorial)
                        @if ($editorial["id_editorial"] == $datos["id_editorial"])
                            <option value="{{ $editorial["id_editorial"] }}" selected>{{ $editorial["nombre"] }}</option>
                        @else
                            <option value="{{ $editorial["id_editorial"] }}">{{ $editorial["nombre"] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                Categoria:
                <select name="id_categoria" id="">
                    @foreach ($categorias as $categoria)
                        @if ($categoria["id_categoria"] == $datos["id_categoria"])
                            <option value="{{ $categoria["id_categoria"] }}" selected>{{ $categoria["nombre"] }}</option>
                        @else
                            <option value="{{ $categoria["id_categoria"] }}">{{ $categoria["nombre"] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                Autor:
                <select name="id_autor" id="">
                    @foreach ($autores as $autor)
                        @if ($autor["id_autor"] == $datos["id_autor"])
                            <option value="{{ $autor["id_autor"] }}" selected>{{ $autor["nombre"] }}</option>
                        @else
                            <option value="{{ $autor["id_autor"] }}">{{ $autor["nombre"] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <p>
                <input type="hidden" name="id_libro" value="{{ $datos["id_libro"] }}">
                <input type="submit" value="Modificar">
            </p>
        </div>
    </form>
</div>  
@endsection