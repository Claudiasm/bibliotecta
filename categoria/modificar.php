<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

// Variables
$id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : null;
$nombre       = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;


// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE categoria SET nombre = :nombre WHERE id_categoria = :id_categoria');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_categoria'=> $id_categoria,
            'nombre'      => $nombre
        ]
    );
    // $miUpdate->debugDumpParams();
    // var_dump($miInsert-->errorInfo());
    // exit;
    $_SESSION["mensajes"] = "Se ha modificado corectamente";
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM categoria WHERE id_categoria = :id_categoria');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_categoria' => $id_categoria,
    ]);
}

// Obtiene un resultado
$datos = $miConsulta->fetch();

echo $blade -> run("categoria.modificar", [
    'datos' => $datos
]);
?>
