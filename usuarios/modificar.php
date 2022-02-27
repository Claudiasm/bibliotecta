<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";



// Variables
$id_usuario = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;
$nombre     = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
$apellidos  = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
$email      = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$password   = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
$tipo       = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : null;


tienePermisos($id_usuario);

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $imagen = $_FILES['imagen']['name'];
    $type   = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];

    if (!empty($imagen) && ($_FILES['imagen']['size'] <= 200000000)) {
        if (($_FILES["imagen"]["type"] == "image/gif")
            || ($_FILES["imagen"]["type"] == "image/jpeg")
            || ($_FILES["imagen"]["type"] == "image/jpg")
            || ($_FILES["imagen"]["type"] == "image/png"))
        {
            $directorio = 'images/';
            move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$imagen);
        }
        else
        {
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        if($imagen == !NULL) echo "La imagen es demasiado grande ";
    }

    $sentencia = 'UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos,
     email = :email, password = :password,
      tipo = :tipo' . (!empty($imagen) ? ', imagen = :imagen ' : '') .
    'WHERE id_usuario = :id_usuario';
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare($sentencia);

    $parametros = [
        'id_usuario' => $id_usuario,
        'nombre'     => $nombre,
        'apellidos'  => $apellidos,
        'email'      => $email,
        'password'   => password_hash($password, PASSWORD_DEFAULT),
        'tipo'       => $tipo
    ];

    if ( !empty($imagen) ) {
    $parametros['imagen'] = $imagen;
    }
    // Ejecuta UPDATE con los datos
    $miUpdate->execute($parametros);

    $_SESSION["mensajes"] = "Se ha modificado corectamente";
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM usuarios WHERE id_usuario = :id_usuario');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_usuario' => $id_usuario
    ]);
}

// Obtiene un resultado
$datos = $miConsulta->fetch();

echo $blade -> run("usuarios.modificar", [
    'datos' => $datos
]);
?>
