<?php

require "../configuracion/configuracion.php";

// Variables
$id_prestamo = isset($_REQUEST['id_prestamo']) ? $_REQUEST['id_prestamo'] : null;

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE prestamo SET estado = "rechazado"
                                 WHERE id_prestamo = :id_prestamo');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_prestamo'    => $id_prestamo
        ]
    );

    $_SESSION["mensajes"] = "El libro ha sido rechazado";
    // Redireccionamos a Leer
    header('Location: index.php');
} 

?>