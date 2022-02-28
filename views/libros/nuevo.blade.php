@extends('layouts.main') 
@section('contenido')

<div class="container mt-5">
    <h2 class="text-center">Añadir Registro</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="nombre">Titulo:</label>
                <input type="text" name="titulo" required>
            </div>
            <div class="custom-control custom-radio">
            Disponible:
                <br>
                    <input type="radio" name="disponible" value="1" selected> Si<br>
                    <input type="radio" name="disponible" value="0"> No<br>
            </div>
            <div class="col-md-3 mb-3">
                Portada:
                <input name="portada" type="file"/><br> 
            </div>
            
            <div class="col-md-3 mb-3">
                Editorial:
                <select name="id_editorial" id="" required>
                    <option value="">Seleccionar una editorial</option>
                    @foreach ($editoriales as $editorial)
                        <option value="{{ $editorial["id_editorial"] }}">{{ $editorial["nombre"] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
            Categoria:
                <select name="id_categoria" id="" required>
                    <option value="">Seleccionar una categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria["id_categoria"] }}">{{ $categoria["nombre"] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                Autor:
                <select name="id_autor" id="">
                    <option value="">Seleccionar un autor</option>
                    @foreach ($autores as $autor)
                        <option value="{{ $autor["id_autor"] }}">{{ $autor["nombre"] }}</option>
                    @endforeach
                </select>
            </div>
            <p>
                <input type="submit" value="Añadir">
            </p>
        </div>
    </form>
</div>  
@endsection