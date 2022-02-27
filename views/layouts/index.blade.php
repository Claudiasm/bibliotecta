@extends('layouts.main')
@section('contenido')

@if ($_SESSION['tipo'])
<style>
  .card > i {
    font-size: 5rem
  }
</style>
<div class="container text-center">

  <div class="row mt-5">
    
    <div class="col-2 ">
      <div class="card border shadow pt-3" style="width: 18rem;">
          <i class="fa fa-solid fa-book"></i>
        <div class="card-body">
          <h5 class="card-title">Gestionar Libros</h5>
          <a class="btn btn-outline-primary" href="./libros/">Ver</a>
          <a class="btn btn-outline-success" href="./libros/nuevo.php">Nuevo</a>
        </div>
      </div>
      
    </div>
    
      <div class="col-2 offset-2">
        <div class="card border shadow pt-3" style="width: 18rem;">
            <i class="fa fa-solid fa-users"></i>
          <div class="card-body">
            <h5 class="card-title">Gestionar Usuarios</h5>
            <a class="btn btn-outline-primary" href="./usuarios/">Ver</a>
            <a class="btn btn-outline-success" href="./usuarios/nuevo.php">Nuevo</a>
          </div>
        </div>
      </div>
     
      <div class="col-2 offset-2">
        <div class="card border shadow pt-3" style="width: 18rem;">
            <i class="fa fa-solid fa-pen-fancy"></i>
          <div class="card-body">
            <h5 class="card-title">Gestionar Autores</h5>
            <a class="btn btn-outline-primary" href="./autores/">Ver</a>
            <a class="btn btn-outline-success" href=".autores/nuevo.php">Nuevo</a>
          </div>
        </div>
        
      </div>

  </div>
  
  <div class="row mt-5">
    
    <div class="col-2 ">
      <div class="card border shadow pt-3" style="width: 18rem;">
          <i class="fa fa-solid fa-sitemap"></i>
        <div class="card-body">
          <h5 class="card-title">Gestionar Categorias</h5>
          <a class="btn btn-outline-primary" href="./categoria/index.php">Ver</a>
          <a class="btn btn-outline-success" href="./categoria/nuevo.php">Nuevo</a>
        </div>
      </div>
      
    </div>
    
    <div class="col-2 offset-2">
      <div class="card border shadow pt-3" style="width: 18rem;">
          <i class="fa fa-solid fa-newspaper"></i>
        <div class="card-body">
          <h5 class="card-title">Gestionar Editorial</h5>
          <a class="btn btn-outline-primary" href="./editorial/">Ver</a>
          <a class="btn btn-outline-success" href="./editorial/nuevo.php">Nuevo</a>
        </div>
      </div>
    </div>

    <div class="col-2 offset-2">
      <div class="card border shadow pt-3" style="width: 18rem;">
          <i class="fa fa-solid fa-calendar"></i>
        <div class="card-body">
          <h5 class="card-title">Gestionar Prestamos</h5>
          <a class="btn btn-outline-primary" href="./prestamos/">Ver</a>
          <a class="btn btn-outline-success" href="./prestamos/nuevo.php">Nuevo</a>
        </div>
      </div>
    </div>

  </div> 
  <div class="row mt-5">

    <div class="col-6 offset-4">
      <div class="card border shadow pt-3" style="width: 18rem;">
          <i class="fa fa-solid fa-bullhorn"></i>
        <div class="card-body">
          <h5 class="card-title">Gestionar Sanciones</h5>
          <a class="btn btn-outline-primary" href="./sanciones/">Ver</a>
          <a class="btn btn-outline-success" href="./sanciones/nuevo.php">Nuevo</a>
        </div>
      </div>
    </div>
  </div>

</div>

@else
<main>
  @if (isset($_SESSION["mensajes"]) || isset($_SESSION["mensajes"]) ) 
    <div class="row g-2">
        <div class="col-3">
        </div>
        <div class="col-6">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $_SESSION["mensajes"] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                
            </div>
        </div>
        <div class="col-3">
        </div>
    </div>

    <?php unset($_SESSION["mensajes"]); ?>
  @endif
  
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach ($libros as $libro)
                <div class="col">
                <div class="card shadow-sm">
                    @if (isset($libro['portada']))
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="libros/images/{{ $libro['portada'] }}" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img>
                    @else
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="libros/images/libro.jpg" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img>
                    @endif
                    <br>
                    <p class="text-center">{{ $libro['titulo'] }}</p>
                    <p class="text-center"><em>- {{ $libro['autor'] }}</em></p>
                    <div class="card-body">
                    <div class="text-center">
                        <div class="btn-group">
                        @if ($libro['disponible'])
                        <a class="btn btn-outline-success" href="./prestamos/solicitar.php?id_libro={{ $libro['id_libro'] }}">Solicitar Libro</a>    
                        @else
                            <button type="button" class="btn btn-sm btn-danger" disabled>No disponible</button>
                        @endif
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            @endforeach

        </div>
      </div>
    </div>
  </main>
@endif
    
@endsection