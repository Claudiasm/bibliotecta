@extends('layouts.main') 
@section('contenido')
<style>
    .form-select {
        display: inline !important
    }
</style>
    <div class="container mt-5">
        <h3 class="text-center">Prestamos</h3>
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Libro</th>
                <th>Usuario</th>
                <th>Fecha Inicio</th>
                <th>Fecha Devolución</th>
                <th>Estado</th>
                <td></td>
                <td></td>
              
            </tr>
            @php ($num_registros = 0)
            @foreach ($datos as $clave => $valor)
            <tr>
                <td>{{ $valor['id_prestamo'] }}</td>
                <td>{{ $valor['libros'] }}</td>
                <td>{{ $valor['usuarios'] }}</td>
                <td>{{ $valor['fecha_prestamo'] }}</td>
                <td>{{ $valor['fecha_devolucion'] }}</td>
                <td>{{ $valor['estado'] }}</td>
                @php ($num_registros++)
            </tr>
            @endforeach    
        </table>
        <p>Número de pedidos: {{ $num_registros }}</p>
    </div>
@endsection
