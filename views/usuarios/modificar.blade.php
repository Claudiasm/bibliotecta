@extends('layouts.main') 
@section('contenido')

<div class="container mt-5">
    <h2 class="text-center">Editar perfil</h2>
    <form action="" method="post" enctype="multipart/form-data">
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
                <label for="nombre">Email</label>
                <input type="email" name="email" value='{{ $datos["email"] }}'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="password">password</label>
                <input type="password" name="password">
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Foto</label>
                <input type="file" name="imagen" value='{{ $datos["imagen"] }}'>
            </div>
            @if ($_SESSION['tipo'])
                <div class="col-md-3 mb-3">
                    Seleccionar un tipo de usuario:
                    <select name="tipo" id="">
                        <option value="1" {{ $datos["tipo"] == 1 ? 'selected' : '' }}>admin</option>
                        <option value="0" {{ $datos["tipo"] == 0 ? 'selected' : '' }}>usuario</option>
                    </select>
                </div>
            @endif
            <p>
                <input type="hidden" name="id_usuario" value="{{ $datos["id_usuario"] }}">
                <input type="submit" value="Modificar">
            </p>
        </div>
    </form>
</div>
@endsection