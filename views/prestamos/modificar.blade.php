@extends('layouts.main') 
@section('contenido')

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <h2 class="text-center mt-5">Modificar Registro</h2>
        <div class="row">
            <div class="col-md-3 mb-3">
                Libro:
                <select name="id_libro" id="">
                    @foreach ($libros as $libro)
                        @if ($libro["id_libro"] == $datos["id_libro"])
                            <option value="{{ $libro["id_libro"] }}" selected>{{ $libro["titulo"] }}</option>
                        @else
                            <option value="{{ $libro["id_libro"] }}">{{ $libro["titulo"] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                Usuario:
                <select name="id_usuario" id="">
                    @foreach ($usuarios as $usuario)
                        @if ($usuario["id_usuario"] == $datos["id_usuario"])
                            <option value="{{ $usuario["id_usuario"] }}">{{ $usuario["nombre"] }}</option>
                        @else
                            <option value="{{ $usuario["id_usuario"] }}">{{ $usuario["nombre"] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-3">
                Fecha Inicio:
                <input name="fecha_prestamo" type="date" value="{{ $datos["fecha_prestamo"] }}"/><br> 
            </div>
            <div class="col-md-3 mb-3">
                Fecha Devolución:
                <input name="fecha_devolucion" type="date" value="{{ $datos["fecha_devolucion"] ?? '' }}"/><br> 
            </div>
            <div class="col-md-3 mb-3">
                Estado:
                <select id="" name="estado" aria-label="Seleccionar un estado">
                    <option value="pendiente" {{ $datos["estado"] == "pendiente" ? 'selected' : '' }}>Pendiente</option>
                    <option value="aceptado" {{ $datos["estado"] == "aceptado" ? 'selected' : '' }}>Aceptado</option>
                    <option value="rechazado" {{ $datos["estado"]  == "rechazado" ? 'selected' : '' }}>Rechazado</option>
                    <option value="finalizado" {{ $datos["estado"]  == "finalizadoe" ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>
            <p>
                <input type="hidden" name="id_prestamo" value="{{ $datos["id_prestamo"] }}">
                <input type="submit" value="Modificar">
            </p>
        </div>
    </form>
</div>
@endsection