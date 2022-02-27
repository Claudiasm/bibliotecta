<?php

require "../configuracion/configuracion.php";

// Variables
$id_prestamo  = isset($_REQUEST['id_prestamo']) ? $_REQUEST['id_prestamo'] : null;

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $miConsulta = $miPDO->prepare('SELECT * FROM prestamo WHERE id_prestamo = :id_prestamo');
    $miConsulta->execute(['id_prestamo'=> $id_prestamo]);
    $datos = $miConsulta->fetch();

    // Prepara UPDATE
    $prestamo = $miPDO->prepare('UPDATE prestamo SET fecha_devolucion = :fecha_devolucion, estado = "finalizado"
                                 WHERE id_prestamo = :id_prestamo');
    // Ejecuta UPDATE con los datos
    $prestamo->execute([
        'id_prestamo'      => $id_prestamo,
        'fecha_devolucion' => date("Y-m-d")
    ]);
    // Prepara UPDATE
    $libro = $miPDO->prepare('UPDATE libros SET disponible = 1
                                 WHERE id_libro = :id_libro');
    // Ejecuta UPDATE con los datos
    $libro->execute([
        'id_libro' => $datos['id_libro']
    ]);

    $fecha_i = date_create($datos['fecha_prestamo']);
    $fecha_d = date_create(date("Y-m-d"));
    
    $intervalo = date_diff($fecha_i, $fecha_d);
    $intervalo_dias = $intervalo->format('%a');
    if ($intervalo_dias > 7) {
        // Prepara UPDATE
        $stmt = $miPDO->prepare('INSERT INTO sanciones (id_usuario, fecha_inicio, fecha_fin, motivo)
        VALUES (:id_usuario, :fecha_inicio, :fecha_fin, "retraso")');

        $intervalo_5_dias = new DateInterval('P5D');
        $fecha_fin_sancion = date_create(date("Y-m-d"));
        $fecha_fin_sancion->add($intervalo_5_dias);
        
        // Ejecuta UPDATE con los datos
        try {
            $stmt->execute(
            [
                'id_usuario'   => $datos['id_usuario'],
                'fecha_inicio' => $fecha_d->format("Y-m-d"),
                'fecha_fin'    => $fecha_fin_sancion->format("Y-m-d")
            ]);
        } catch (PDOException $th) {
            echo "Error:".$th->getMessage();
            // var_dump($miInsert)->errorInfo();
            die();
        }
    } 
    

    $_SESSION["mensajes"] = "El libro ha sido entregado";
    // Redireccionamos a Leer
    header('Location: index.php');
} 

?>