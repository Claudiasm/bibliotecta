<?php

require "../configuracion/configuracion.php";

// Variables
$id_prestamo      = isset($_REQUEST['id_prestamo']) ? $_REQUEST['id_prestamo'] : null;
$id_libro         = isset($_REQUEST['id_libro']) ? $_REQUEST['id_libro'] : null;
$id_usuario       = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;
$fecha_prestamo   = !isset($_REQUEST['fecha_prestamo']) || $_REQUEST['fecha_prestamo']  == "" ? null : $_REQUEST['fecha_prestamo'];
$fecha_devolucion = !isset($_REQUEST['fecha_devolucion']) || $_REQUEST['fecha_devolucion'] == "" ? null : $_REQUEST['fecha_devolucion'];
$estado           = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : null;

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE prestamo SET id_libro = :id_libro, 
                                id_usuario = :id_usuario,
                                fecha_prestamo = :fecha_prestamo, fecha_devolucion = :fecha_devolucion,
                                estado = :estado
                                WHERE id_prestamo = :id_prestamo');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_prestamo'      => $id_prestamo,
            'id_libro'         => $id_libro,
            'id_usuario'       => $id_usuario,
            'fecha_prestamo'   => $fecha_prestamo,
            'fecha_devolucion' => $fecha_devolucion,
            'estado'           => $estado
        ]
    );
    $_SESSION["mensajes"] = "Se ha modificado corectamente";

    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM prestamo WHERE id_prestamo = :id_prestamo');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_prestamo' => $id_prestamo,
    ]);
}

// Obtiene un resultado
$datos = $miConsulta->fetch();

$stmt = $miPDO-> prepare("SELECT * FROM libros;");
$stmt-> execute();
$libros = $stmt->fetchAll();

$stmt = $miPDO-> prepare("SELECT * FROM usuarios;");
$stmt-> execute();
$usuarios = $stmt->fetchAll();

echo $blade -> run("prestamos.modificar", [
    "datos"    => $datos,
    "libros"   => $libros,
    "usuarios" => $usuarios
]);
?>
