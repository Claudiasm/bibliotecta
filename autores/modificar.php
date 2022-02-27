<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

// Variables
$id_autor            = isset($_REQUEST['id_autor']) ? $_REQUEST['id_autor'] : null;
$nombre              = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
$apellidos           = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
$fecha_nacimiento    = isset($_REQUEST['fecha_nacimiento']) ? $_REQUEST['fecha_nacimiento'] : null;
$fecha_fallecimiento = isset($_REQUEST['fecha_fallecimiento']) ? $_REQUEST['fecha_fallecimiento'] : null;
$lugar_nacimiento    = isset($_REQUEST['lugar_nacimiento']) ? $_REQUEST['lugar_nacimiento'] : null;
$biografia           = isset($_REQUEST['biografia']) ? $_REQUEST['biografia'] : null;

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $imagen = $_FILES['imagen']['name'];
    $tipo   = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];

    if (!empty($imagen) && ($_FILES['imagen']['size'] <= 200000000)) {
        if (($_FILES["imagen"]["type"] == "image/gif")
            || ($_FILES["imagen"]["type"] == "image/jpeg")
            || ($_FILES["imagen"]["type"] == "image/jpg")
            || ($_FILES["imagen"]["type"] == "image/png"))
        {
            $directorio = 'images/';
            move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$imagen);
        }
        else
        {
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        if($imagen == !NULL) echo "La imagen es demasiado grande ";
    }

    $sentencia = 'UPDATE autor
    SET nombre = :nombre, apellidos = :apellidos, 
    fecha_nacimiento = :fecha_nacimiento, fecha_fallecimiento = :fecha_fallecimiento,
    lugar_nacimiento = :lugar_nacimiento, biografia = :biografia ' . (!empty($imagen) ? ', imagen = :imagen ' : '') .
    'WHERE id_autor = :id_autor';

   // Prepara UPDATE
    $miUpdate = $miPDO->prepare($sentencia);

    $parametros = [
        'id_autor'            => $id_autor,
        'nombre'              => $nombre,
        'apellidos'           => $apellidos,
        'fecha_nacimiento'    => $fecha_nacimiento,
        'fecha_fallecimiento' => $fecha_fallecimiento,
        'lugar_nacimiento'    => $lugar_nacimiento,
        'biografia'           => $biografia
    ];

   if ( !empty($imagen) ) {
    $parametros['imagen'] = $imagen;
    }
    // Ejecuta UPDATE con los datos
    $miUpdate->execute($parametros);

    $_SESSION["mensajes"] = "Se ha modificado corectamente";
    // Redireccionamos a Leer
    header('Location: index.php');
    // echo $sentencia;
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM autor WHERE id_autor = :id_autor');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_autor' => $id_autor
    ]);

    // Obtiene un resultado
    $datos = $miConsulta->fetch();

    echo $blade -> run("autor.modificar", [
        'datos' => $datos
    ]);
}


?>