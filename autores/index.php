<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM Autor WHERE nombre LIKE CONCAT("%", :nombre, "%");');
    $miConsulta->execute([
        'nombre' => $nombre
    ]);
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM Autor;');
    // Ejecuta consulta
    $miConsulta->execute();
}

$datos = $miConsulta->fetchAll();

echo $blade -> run("autor.index", [
    'datos' => $datos
]);



?>