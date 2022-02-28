<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Recogemos variables
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;   
    // Prepara UPDATE
    $miInsert = $miPDO->prepare('INSERT INTO categoria (nombre) VALUES (:nombre)');
    // Ejecuta UPDATE con los datos
    $miInsert->execute(['nombre' => $nombre]);
    
    $_SESSION["mensajes"] = "Registro añadido corectamente";
    // Redireccionamos a Leer
    header('Location: index.php');
    // $miInsert->debugDumpParams();
    // var_dump($miInsert-->errorInfo());
    // exit;
} 

echo $blade -> run("categoria.nuevo");
?>

