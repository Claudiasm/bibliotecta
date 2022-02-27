@extends('layouts.main') 
@section('contenido')
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2 class="text-center mt-5">Modificar Registro</h2>
            <div class="container">
                <div class="col-md-3 mb-3">
                    Usuario:
                    <select name="id_usuario" id="">
                        @foreach ($usuarios as $usuario)
                            @if ($usuario["id_usuario"] == $datos["id_usuario"])
                                <option value="{{ $usuario["id_usuario"] }}" selected>{{ $usuario["nombre"] }}</option>
                            @else
                                <option value="{{ $usuario["id_usuario"] }}">{{ $usuario["nombre"] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    Fecha Inicio:
                    <input name="fecha_inicio" type="date" value="{{ $datos["fecha_inicio"] }}"/><br> 
                </div>
                <div class="col-md-3 mb-3">
                    Fecha Fin:
                    <input name="fecha_fin" type="date" value="{{ $datos["fecha_fin"] }}"/><br> 
                </div>
                <div class="col-md-3 mb-3">
                    Motivo:
                    <input name="motivo" type="text" value="{{ $datos["motivo"] }}"/><br> 
                </div>
                <p>
                    <input type="hidden" name="id_sancion" value="{{ $datos["id_sancion"] }}">
                    <input type="submit" value="Modificar">
                </p>
            </div>
        </form>
    </div>
@endsection