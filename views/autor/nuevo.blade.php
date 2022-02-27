@extends('layouts.main') 
@section('contenido')

    <div class="container mt-5">
        <h2 class="text-center">Añadir Registro</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-3 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Apellidos</label>
                <input type="text" name="apellidos" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Fecha de fallecimiento</label>
                <input type="date" name="fecha_fallecimiento">
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Lugar de nacimiento</label>
                <input type="text" name="lugar_nacimiento">
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Biografia</label>
                <input type="text" name="biografia">
            </div>
            <div class="col-md-3 mb-3">
                Imagen:
                <input name="imagen" type="file"/><br> 
            </div>
            <p>
                <input type="submit" value="Añadir">
            </p>
        </form>
    </div>

@endsection
