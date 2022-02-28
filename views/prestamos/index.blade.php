@extends('layouts.main') 
@section('contenido')
<style>
    .form-select {
        display: inline !important
    }
</style>
    <div class="container mt-5">
        @if (isset($_SESSION["mensajes"])) 
            <div class="row g-2">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{$_SESSION["mensajes"]}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>

            <?php unset($_SESSION["mensajes"]); ?>
        @endif
        <h3 class="text-center">Gestión de Prestamos</h3>
        <div class="d-flex justify-content-between mb-2">
            <p><a class="btn btn-outline-success" href="../prestamos/nuevo.php">Nuevo Prestamo</a></p>
            
            <form action="" method="get">
                <div class="input-group">
                    <select class="form-select" id="" name="filtrar" aria-label="Seleccionar un estado">
                        <option value="">Todos</option>
                        <option value="pendiente" {{ $estado == "pendiente" ? 'selected' : '' }}>Pendiente</option>
                        <option value="aceptado" {{ $estado == "aceptado" ? 'selected' : '' }}>Aceptado</option>
                        <option value="rechazado" {{ $estado == "rechazado" ? 'selected' : '' }}>Rechazado</option>
                        <option value="finalizado" {{ $estado == "finalizadoe" ? 'selected' : '' }}>Finalizado</option>
                    </select>
                    <input type="text" name="buscar" placeholder="Buscar por nombre" class="form-control">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    
                </div>
            </form>
           
        </div>
        
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
                @if ( $estado == "pendiente" )
                    <td><a class="btn btn-outline-primary" href="../prestamos/admitir.php?id_prestamo={{ $valor['id_prestamo'] }}&id_libro={{ $valor['id_libro'] }}">Admitir</a></td>
                    <td><a class="btn btn-outline-danger" href="../prestamos/denegar.php?id_prestamo={{ $valor['id_prestamo'] }}">Denegar</a></td>
                @elseif ( $estado == "aceptado" )
                    <td><a class="btn btn-outline-success" href="../prestamos/entregar.php?id_prestamo={{ $valor['id_prestamo'] }}&id_libro={{ $valor['id_libro'] }}}&fecha_prestamo={{ $valor['fecha_prestamo'] }}">Entregar</a></td>
                    <td></td>
                @else 
                    <td><a class="btn btn-outline-primary" href="../prestamos/modificar.php?id_prestamo={{ $valor['id_prestamo'] }}">Modificar</a></td>
                    <td></td>
                @endif
                @php ($num_registros++)
            </tr>
            @endforeach    
        </table>
        <p>Número de registros: {{ $num_registros }}</p>
    </div>
@endsection
