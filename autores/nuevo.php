<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Recogemos variables
    $nombre              = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
    $apellidos           = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
    $fecha_nacimiento    = isset($_REQUEST['fecha_nacimiento']) ? $_REQUEST['fecha_nacimiento'] : null;
    $fecha_fallecimiento = isset($_REQUEST['fecha_fallecimiento ']) ? $_REQUEST['fecha_fallecimiento '] : null;
    $lugar_nacimiento    = isset($_REQUEST['lugar_nacimiento']) ? $_REQUEST['lugar_nacimiento'] : null;
    $biografia           = isset($_REQUEST['biografia']) ? $_REQUEST['biografia'] : null;
    $imagen              = isset($_REQUEST['imagen']) ? $_REQUEST['imagen'] : null;
   
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

    // Prepara UPDATE
    $miInsert = $miPDO->prepare('INSERT INTO autor (nombre, apellidos, fecha_nacimiento, fecha_fallecimiento, lugar_nacimiento, biografia, imagen) 
                                VALUES (:nombre, :apellidos, :fecha_nacimiento, :fecha_fallecimiento, :lugar_nacimiento, :biografia, :imagen)');
    // Ejecuta UPDATE con los datos
    $miInsert->execute(
        [
            'nombre'              => $nombre,
            'apellidos'           => $apellidos,
            'fecha_nacimiento'    => $fecha_nacimiento,
            'fecha_fallecimiento' => $fecha_fallecimiento,
            'lugar_nacimiento'    => $lugar_nacimiento,
            'biografia'           => $biografia,
            'imagen'              => $imagen
        ]
    );
    // $miInsert->debugDumpParams();
    // var_dump($miInsert-->errorInfo());
    // exit;
    $_SESSION["mensajes"] = "Registro añadido corectamente";
    // Redireccionamos a Leer
     header('Location: index.php');
} 

echo $blade -> run("autor.nuevo");
?>

