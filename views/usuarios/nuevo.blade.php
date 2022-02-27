@extends('layouts.main') 
@section('contenido')

<body>
    <div class="container mt-5">
        <h2 class="text-center">Añadir Registro</h2>
        <form action="" method="post" enctype="multipart/form-data">
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
                <label for="nombre">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="nombre">Foto</label>
                <input type="file" name="imagen">
            </div>
            <div class="col-md-3 mb-3">
                Seleccionar un tipo de usuario:
                <select name="tipo" id="">
                    <option value="0" selected >Usuario</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <p>
                <input type="submit" value="Añadir">
            </p>
        </form>
    </div>
@endsection