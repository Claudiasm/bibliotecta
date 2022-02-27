<?php

require "../configuracion/configuracion.php";

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Recogemos variables
    $id_libro         = isset($_REQUEST['id_libro']) ? $_REQUEST['id_libro'] : null;
    $id_usuario       = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;

    // Prepara UPDATE
    $stmt = $miPDO->prepare('INSERT INTO prestamo (id_libro, id_usuario)
                                VALUES (:id_libro, :id_usuario)');
    // Ejecuta UPDATE con los datos
    try {
    $stmt->execute(
        [
            'id_libro'         => $id_libro,
            'id_usuario'       => $id_usuario
        ]);

    $_SESSION["mensajes"] = "Registro añadido corectamente";
        // Redireccionamos a Leer
    header('Location: index.php');

   } catch (PDOException $th) {
        echo "Error:".$th->getMessage();
        // var_dump($miInsert)->errorInfo();
        die();
    }

} 
$stmt = $miPDO-> prepare("SELECT * FROM libros;");
$stmt-> execute();
$libros = $stmt->fetchAll();

$stmt = $miPDO-> prepare("SELECT * FROM usuarios;");
$stmt-> execute();
$usuarios = $stmt->fetchAll();

echo $blade -> run("prestamos.nuevo", [
    "libros"   => $libros,
    "usuarios" => $usuarios
]);
?>

