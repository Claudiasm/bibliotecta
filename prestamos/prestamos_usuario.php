<?php

require "../configuracion/configuracion.php";

$mostrar = 'SELECT p.*, 
            libros.titulo as libros, 
            usuarios.nombre as usuarios
            FROM prestamo p
            LEFT JOIN libros ON p.id_libro = libros.id_libro
            LEFT JOIN usuarios ON p.id_usuario = usuarios.id_usuario
            WHERE p.id_usuario = :id_usuario';   

$miConsulta = $miPDO->prepare($mostrar);
$miConsulta->execute([ 'id_usuario' => $_SESSION['id_usuario'] ]);
$datos = $miConsulta->fetchAll();
echo $blade -> run("prestamos.prestamos_usuario", [
    'datos'  => $datos
]);

?>