@extends('layouts.main') 
@section('contenido')

<div class="container mt-5">
    <h2 class="text-center">Modificar registro</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value='{{ $datos["nombre"] }}'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Apellidos</label>
                <input type="text" name="apellidos" value='{{ $datos["apellidos"] }}'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" value='{{ $datos["fecha_nacimiento"] }}'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Fecha de fallecimiento</label>
                <input type="date" name="fecha_fallecimiento" value='{{ $datos["fecha_fallecimiento"] }}'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Lugar de nacimiento</label>
                <input type="text" name="lugar_nacimiento" value='{{ $datos["lugar_nacimiento"] }}'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Biografia</label>
                <input type="text" name="biografia" value='{{ $datos["biografia"] }}'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Foto</label>
                <input type="file" name="imagen" value='{{ $datos["foto"] }}'>
            </div>
            <p>
                <input type="hidden" name="id_autor" value="{{ $datos["id_autor"] }}">
                <input type="submit" value="Modificar">
            </p>
        </div>
    </form>

@endsection
