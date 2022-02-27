<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>BIBLIOTECA</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

        <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="theme-color" content="#7952b3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      html, body {
        height: 100%;
      }

      #contenido {
        flex: 1 0 auto;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
      <div class="container-fluid">
        @if (substr(getcwd(), -10) == "Biblioteca")
          <a class="navbar-brand" href="./index.php">Biblioteca</a>
        @else
          <a class="navbar-brand" href="../index.php">Biblioteca</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              @if (substr(getcwd(), -10) == "Biblioteca")
                <a class="nav-link" href="./usuarios/modificar.php?id_usuario={{ $_SESSION['id_usuario'] }}">Perfil</a>
              @else
                <a class="nav-link" href="../usuarios/modificar.php?id_usuario={{ $_SESSION['id_usuario'] }}">Perfil</a> 
              @endif
            </li>
            @if (!$_SESSION['tipo'])
              <li class="nav-item">
                <a class="nav-link" href="./prestamos/prestamos_usuario.php">Prestamos</a>
              </li>
            @endif
            @if ($_SESSION['tipo'])
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Gestiones
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  
                  @if (substr(getcwd(), -10) == "Biblioteca")
                    <li><a class="dropdown-item" href="./libros/">Libros</a></li>
                    <li><a class="dropdown-item" href="./usuarios/">Usuarios</a></li>
                    <li><a class="dropdown-item" href="./autores/">Autores</a></li>
                    <li><a class="dropdown-item" href="./categoria/">Categorias</a></li>
                    <li><a class="dropdown-item" href="./editorial/">Editorial</a></li>
                    <li><a class="dropdown-item" href="./prestamos/">Prestamos</a></li>
                    <li><a class="dropdown-item" href="./sanciones/">Sanciones</a></li>
                  @else
                    <li><a class="dropdown-item" href="../libros/">Libros</a></li>
                    <li><a class="dropdown-item" href="../usuarios/">Usuarios</a></li>
                    <li><a class="dropdown-item" href="../autores/">Autores</a></li>
                    <li><a class="dropdown-item" href="../categoria/">Categorias</a></li>
                    <li><a class="dropdown-item" href="../editorial/">Editorial</a></li>
                    <li><a class="dropdown-item" href="../prestamos/">Prestamos</a></li>
                    <li><a class="dropdown-item" href="../sanciones/">Sanciones</a></li>
                  @endif
                </ul>
              </li>
            @endif
          </ul>
        </div>
        
        <li class="nav-item">
          @if (substr(getcwd(), -10) == "Biblioteca")
            <a class="nav-link text-light" href="./logout.php"><i class="fa fa-solid fa-power-off"></i></a>
          @else
            <a class="nav-link text-light" href="../logout.php"><i class="fa fa-solid fa-power-off"></i></a>
          @endif
        </li>
        
      </div>
    </nav>
    <div id="contenido">
        @yield('contenido')
    </div>

  <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-light text-muted">
      <div class="container text-center">
        <small>2ºASIRM &copy; Claudia Santana Morales</small>
      </div>
  </footer>

  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
