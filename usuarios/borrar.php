<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_usuario = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;
    // Prepara DELETE
    // echo $id;
    $miConsulta = $miPDO->prepare('DELETE FROM usuarios WHERE id_usuario = :id_usuario');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_usuario' => $id_usuario
    ]);
    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
}
?>
