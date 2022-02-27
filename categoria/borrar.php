<?php
require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : null;
    // Prepara DELETE
    // echo $id_categoria;
    $miConsulta = $miPDO->prepare('DELETE FROM categoria WHERE id_categoria = :id_categoria');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_categoria' => $id_categoria
    ]);
    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
}
?>
