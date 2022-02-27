@extends('layouts.main') 
@section('contenido')
    
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
        <h3 class="text-center">Gestión de Sanciones</h3>
        <div class="d-flex justify-content-between mb-2">
            <p><a class="btn btn-outline-success" href="../sanciones/nuevo.php">Nuevo Sanción</a></p>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="buscar" placeholder="Buscar por nombre" class="form-control">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
           
        </div>
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Motivo</th>
                <td></td>
                <td></td>
              
            </tr>
            @php ($num_registros = 0)
            @foreach ($datos as $clave => $valor)
            <tr>
                <td>{{ $valor['id_sancion'] }}</td>
                <td>{{ $valor['usuarios'] }}</td>
                <td>{{ $valor['fecha_inicio'] }}</td>
                <td>{{ $valor['fecha_fin'] }}</td>
                <td>{{ $valor['motivo'] }}</td>
                <td><a class="btn btn-outline-secondary" href="../sanciones/modificar.php?id_sancion={{ $valor['id_sancion'] }}">Modificar</a></td>
                <td><a class="btn btn-outline-danger" href="../sanciones/borrar.php?id_sancion={{ $valor['id_sancion'] }}">Borrar</a></td>
                @php ($num_registros++)
            </tr>
            @endforeach    
        </table>
        <p>Número de registros: {{ $num_registros }}</p>
    </div>
@endsection
