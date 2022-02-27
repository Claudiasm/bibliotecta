<?php

require "../configuracion/configuracion.php";

// Variables
$id_prestamo = isset($_REQUEST['id_prestamo']) ? $_REQUEST['id_prestamo'] : null;
$id_libro    = isset($_REQUEST['id_libro']) ? $_REQUEST['id_libro'] : null;


// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Prepara UPDATE
    $prestamo = $miPDO->prepare('UPDATE prestamo SET fecha_prestamo = :fecha_prestamo, estado = "aceptado"
                                 WHERE id_prestamo = :id_prestamo');
    // Ejecuta UPDATE con los datos
    $prestamo->execute(
        [
            'id_prestamo'    => $id_prestamo,
            'fecha_prestamo' => date("Y-m-d")
        ]
    );
    // Prepara UPDATE
    $libro = $miPDO->prepare('UPDATE libros SET disponible = 0
                                 WHERE id_libro = :id_libro');
    // Ejecuta UPDATE con los datos
    $libro->execute(
        [
            'id_libro'=> $id_libro
        ]
    );
    

    $_SESSION["mensajes"] = "El libro ha sido aceptado";
    // Redireccionamos a Leer
    header('Location: index.php');
} 

?>