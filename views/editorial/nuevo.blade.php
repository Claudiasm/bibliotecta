@extends('layouts.main') 
@section('contenido')
    <div class="container mt-5">
        <h2 class="text-center">Añadir Registro</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" required>
                </div>
                <p>
                    <input type="submit" value="Añadir">
                </p>
            </div>
        </form>
    </div>
@endsection