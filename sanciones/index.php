<?php

require "../configuracion/configuracion.php";

$mostrar = 'SELECT s.*, 
            usuarios.nombre as usuarios
            FROM sanciones s
            LEFT JOIN usuarios ON s.id_usuario = usuarios.id_usuario';   
            
$buscar =  'SELECT s.*, 
            usuarios.nombre as usuarios
            FROM sanciones s
            LEFT JOIN usuarios ON s.id_usuario = usuarios.id_usuario
            WHERE usuarios.nombre LIKE CONCAT("%", :usuario, "%")';            

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare($buscar);
    $miConsulta->execute([
        'usuario' => $usuario
    ]);
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare($mostrar);
    // Ejecuta consulta
    $miConsulta->execute();
}

$datos = $miConsulta->fetchAll();

echo $blade -> run("sanciones.index", [
    'datos' => $datos
]);

?>