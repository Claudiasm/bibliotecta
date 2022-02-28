<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

$mostrar = 'SELECT p.*, 
            libros.titulo as libros, 
            usuarios.nombre as usuarios
            FROM prestamo p
            LEFT JOIN libros ON p.id_libro = libros.id_libro
            LEFT JOIN usuarios ON p.id_usuario = usuarios.id_usuario';   

$buscar =  'SELECT p.*,
            libros.titulo as libros, 
            usuarios.nombre as usuarios
            FROM prestamo p 
            LEFT JOIN usuarios ON p.id_usuario = usuarios.id_usuario 
            LEFT JOIN libros ON p.id_libro = libros.id_libro 
            WHERE p.estado LIKE CONCAT("%", :estado, "%")
            AND usuarios.nombre LIKE CONCAT("%", :nombre, "%")';

$estado = $_REQUEST['filtrar'] ?? '';
$nombre = $_REQUEST['buscar'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $miConsulta = $miPDO->prepare($buscar);
    $miConsulta->execute([
        'estado' => $estado,
        'nombre' => $nombre
    ]);
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare($buscar);
    // Ejecuta consulta
    $miConsulta->execute();
}

$datos = $miConsulta->fetchAll();
echo $blade -> run("prestamos.index", [
    'datos'  => $datos,
    'estado' => $estado
]);

?>