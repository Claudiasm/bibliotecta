<?php

require "../configuracion/configuracion.php";

// Variables
$id_sancion   = isset($_REQUEST['id_sancion']) ? $_REQUEST['id_sancion'] : null;
$id_usuario   = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;
$fecha_inicio = isset($_REQUEST['fecha_inicio']) ? $_REQUEST['fecha_inicio'] : null;
$fecha_fin    = isset($_REQUEST['fecha_fin']) ? $_REQUEST['fecha_fin'] : null;
$motivo       = isset($_REQUEST['motivo']) ? $_REQUEST['motivo'] : null;

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE sanciones SET id_usuario = :id_usuario, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin, motivo = :motivo
                                 WHERE id_sancion  = :id_sancion ');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_sancion'   => $id_sancion,
            'id_usuario'   => $id_usuario,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'motivo'       => $motivo
        ]
    );
    $_SESSION["mensajes"] = "Se ha modificado corectamente";
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM sanciones WHERE id_sancion = :id_sancion');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_sancion' => $id_sancion,
    ]);
}

// Obtiene un resultado
$datos = $miConsulta->fetch();

$stmt = $miPDO-> prepare("SELECT * FROM usuarios;");
$stmt-> execute();
$usuarios = $stmt->fetchAll();

echo $blade -> run("sanciones.modificar", [
    "datos"    => $datos,
    "usuarios" => $usuarios
]);
?>
