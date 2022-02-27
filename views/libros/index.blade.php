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
        
        <h3 class="text-center">Gestión de Libros</h3>

        <div class="d-flex justify-content-between mb-2">
            <p><a class="btn btn-outline-success" href="../libros/nuevo.php">Nuevo Libro</a></p>

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
                <th>Titulo</th>
                <th>Autor</th>
                <th>Disponible</th>
                <th>Portada</th>
                <th>Editorial</th>
                <th>Categoria</th>
                <td></td>
                <td></td>
              
            </tr>
            @php ($num_registros = 0)
            @foreach ($datos  as $clave => $valor)
            <tr>
                <td>{{ $valor['id_libro'] }}</td>
                <td>{{ $valor['titulo'] }}</td>
                <td>{{ $valor['autor'] }}</td>
                <td><i class='fas fa-circle {{$valor['disponible']?'text-success': 'text-danger'}}'></i></td>
                <td><img src='images/{{ $valor['portada'] }}' alt="" class="img-thumbnail"></td>
                <td>{{ $valor['editorial'] }}</td>
                <td>{{ $valor['categoria'] }}</td>
                <td>
                    @if ($_SESSION['tipo'])
                        <a class="btn btn-outline-secondary" href="../libros/modificar.php?id_libro={{ $valor['id_libro'] }}">Modificar</a>
                    @endif
                </td>
                <td>
                    @if ($_SESSION['tipo'])
                        <a class="btn btn-outline-danger" href="../libros/borrar.php?id_libro={{ $valor['id_libro'] }}">Borrar</a>
                    @endif
                </td>
                @php ($num_registros++)
            </tr>
            @endforeach    
        </table>
        <p>Número de registros: {{ $num_registros }}</p>
    </div>
@endsection
