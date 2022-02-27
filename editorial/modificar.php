<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

// Variables
$id_editorial     = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;


// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE editorial SET nombre = :nombre WHERE id_editorial = :id_editorial');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_editorial'=> $id_editorial,
            'nombre'      => $nombre
        ]
    );
    $_SESSION["mensajes"] = "Se ha modificado corectamente";
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM editorial WHERE id_editorial = :id_editorial');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_editorial' => $id_editorial,
    ]);
}

// Obtiene un resultado
$datos = $miConsulta->fetch();

echo $blade -> run("editorial.modificar", [
    'datos' => $datos
]);
?>
