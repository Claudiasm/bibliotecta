<?php
require "../configuracion/configuracion.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_prestamo = isset($_REQUEST['id_prestamo']) ? $_REQUEST['id_prestamo'] : null;
    // Prepara DELETE
    echo $id;
    $miConsulta = $miPDO->prepare('DELETE FROM prestamo WHERE id_prestamo = :id_prestamo');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_prestamo' => $id_prestamo
    ]);
    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
}
?>
