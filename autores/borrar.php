<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_autor = isset($_REQUEST['id_autor']) ? $_REQUEST['id_autor'] : null;
    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM Autor WHERE id_autor = :id_autor');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_autor' => $id_autor
    ]);
    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
}
?>
