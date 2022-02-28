<?php

require "../configuracion/configuracion.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_sancion = isset($_REQUEST['id_sancion']) ? $_REQUEST['id_sancion'] : null;
    // Prepara DELETE
    echo $id;
    $miConsulta = $miPDO->prepare('DELETE FROM sanciones WHERE id_sancion = :id_sancion');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_sancion' => $id_sancion
    ]);
    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
}
?>

