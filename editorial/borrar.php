<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_editorial = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;
    // Prepara DELETE
    echo $id;
    $miConsulta = $miPDO->prepare('DELETE FROM editorial WHERE id_editorial = :id_editorial');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_editorial' => $id_editorial
    ]);
    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
}
?>
