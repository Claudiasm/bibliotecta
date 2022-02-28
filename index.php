<?php

require "./configuracion/configuracion_index.php";

$mostrar = 'SELECT l.*, 
            autor.nombre as autor, 
            categoria.nombre as categoria,
            editorial.nombre as editorial
            FROM libros l
            LEFT JOIN autor ON l.id_autor = autor.id_autor
            LEFT JOIN categoria ON l.id_categoria = categoria.id_categoria
            LEFT JOIN editorial ON l.id_editorial = editorial.id_editorial';
$buscar = 'SELECT l.*, 
            autor.nombre as autor, 
            categoria.nombre as categoria,
            editorial.nombre as editorial
            FROM libros l
            LEFT JOIN autor ON l.id_autor = autor.id_autor
            LEFT JOIN categoria ON l.id_categoria = categoria.id_categoria
            LEFT JOIN editorial ON l.id_editorial = editorial.id_editorial
            WHERE titulo LIKE CONCAT("%", :titulo, "%")';      

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo= isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare($buscar);
    $miConsulta->execute([
        'titulo' => $titulo
    ]);
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare($mostrar);
    // Ejecuta consulta
    $miConsulta->execute();
}

$datos = $miConsulta->fetchAll();

echo $blade -> run("layouts.index", [
    'libros' => $datos
]);

?>
