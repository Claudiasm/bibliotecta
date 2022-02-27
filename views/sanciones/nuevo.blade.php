@extends('layouts.main') 
@section('contenido')
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2 class="text-center mt-5">Modificar Registro</h2>
            <div class="container">
                <div class="col-md-3 mb-3">
                    Usuario:
                    <select name="id_usuario" id="" required>
                        <option value="">Seleccionar un usuario</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario["id_usuario"] }}">{{ $usuario["nombre"] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    Fecha Inicio:
                    <input name="fecha_inicio" type="date" required/><br> 
                </div>
                <div class="col-md-3 mb-3">
                    Fecha Fin:
                    <input name="fecha_fin" type="date" required/><br> 
                </div>
                <div class="col-md-3 mb-3">
                    Motivo:
                    <input name="motivo" type="text" required/><br> 
                </div>
                <p>
                    <input type="submit" value="Añadir">
                </p>
            </div>
        </form>
    </div>  
@endsection