<?php

require "../configuracion/configuracion.php";

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Comprobar si está sancionado
    $consultaSanciones = 'SELECT COUNT(*) FROM sanciones 
        WHERE id_usuario = :id_usuario
        AND fecha_fin > CURRENT_DATE;';

    $sanciones = $miPDO->prepare($consultaSanciones);
    $sanciones->execute(['id_usuario' => $_SESSION['id_usuario']]);
    $n_sanciones = $sanciones->fetch();
    if (intval($n_sanciones[0]) > 0) {
        $_SESSION['mensajes'] = "Está sancionado temporalmente";
        header('Location:../index.php');
        return;
    }

    $consulta = 'SELECT count(*)
    FROM prestamo 
    WHERE (estado = "aceptado" OR estado = "pendiente") 
        AND id_usuario = :id_usuario'; 

    $filtro = $miPDO->prepare($consulta);

    $filtro->execute(['id_usuario' => $_SESSION['id_usuario']]);

    $prestamos = $filtro->fetch();
    // echo gettype($prestamos[0]);

    if (intval($prestamos[0]) >= 2) {
        $_SESSION["mensajes"] = "No puede solicitar más de dos libros";
        header('Location: ../index.php');

    } else {
   
        // Recogemos variables
        $id_libro = isset($_REQUEST['id_libro']) ? $_REQUEST['id_libro'] : null;

        // Prepara UPDATE
        $stmt = $miPDO->prepare('INSERT INTO prestamo (id_libro, id_usuario)
                                    VALUES (:id_libro, :id_usuario)');
        // Ejecuta UPDATE con los datos
        try {
        $stmt->execute(
            [
                'id_libro'   => $id_libro,
                'id_usuario' => $_SESSION['id_usuario']
            ]);

        $_SESSION["mensajes"] = "Se ha realizado la solicitud";
            // Redireccionamos a Leer
        header('Location: ../index.php');

        } catch (PDOException $th) {
            echo "Error:".$th->getMessage();
            // var_dump($miInsert)->errorInfo();
            die();
        }
    }



} 
?>