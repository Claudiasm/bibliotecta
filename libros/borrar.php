<?php
require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_libro = isset($_REQUEST['id_libro']) ? $_REQUEST['id_libro'] : null;
    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM libros WHERE id_libro = :id_libro');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_libro' => $id_libro
    ]);
    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
}
?>
