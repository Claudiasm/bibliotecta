@extends('layouts.main') 
@section('contenido')
    <div class="container mt-5">
        <h2 class="text-center">Modificar registro</h2>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value='{{ $datos["nombre"] }}'>
                </div>
                <p>
                    <input type="hidden" name="id_autor" value="{{ $datos["id_editorial"] }}">
                    <input type="submit" value="Modificar">
                </p>
            </div>
        </form>
    </body>
    </html>
@endsection