<?php

require "../configuracion/configuracion.php";

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Recogemos variables
     $id_usuario   = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;
     $fecha_inicio = isset($_REQUEST['fecha_inicio']) ? $_REQUEST['fecha_inicio'] : null;
     $fecha_fin    = isset($_REQUEST['fecha_fin']) ? $_REQUEST['fecha_fin'] : null;
     $motivo       = isset($_REQUEST['motivo']) ? $_REQUEST['motivo'] : null;
    
    // Prepara UPDATE
    $stmt = $miPDO->prepare('INSERT INTO sanciones (id_usuario, fecha_inicio, fecha_fin, motivo)
                                 VALUES (:id_usuario, :fecha_inicio, :fecha_fin, :motivo)');
    // Ejecuta UPDATE con los datos
    try {
    $stmt->execute(
        [
            'id_usuario'   => $id_usuario,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin'    => $fecha_fin,
            'motivo'       => $motivo
        ]);

    $_SESSION["mensajes"] = "Registro añadido corectamente";
        // Redireccionamos a Leer
    header('Location: index.php');
    exit;

   } catch (PDOException $th) {
        echo "Error:".$th->getMessage();
        // var_dump($miInsert)->errorInfo();
        die();
    }

} 

$stmt = $miPDO-> prepare("SELECT * FROM usuarios;");
$stmt-> execute();
$usuarios = $stmt->fetchAll();

echo $blade -> run("sanciones.nuevo",
[
     "usuarios" => $usuarios
]);
?>

