<?php
require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

// Variables
$id_libro     = isset($_REQUEST['id_libro']) ? $_REQUEST['id_libro'] : null;
$titulo       = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
$disponible   = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;
$id_editorial = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;
$id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : null;
$id_autor     = isset($_REQUEST['id_autor']) ? $_REQUEST['id_autor'] : null;

// echo $id_editorial;

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $imagen = $_FILES['portada']['name'];
    $type   = $_FILES['portada']['type'];
    $tamano = $_FILES['portada']['size'];

    if (!empty($imagen) && ($_FILES['portada']['size'] <= 200000000)) {
        if (($_FILES["portada"]["type"] == "image/gif")
            || ($_FILES["portada"]["type"] == "image/jpeg")
            || ($_FILES["portada"]["type"] == "image/jpg")
            || ($_FILES["portada"]["type"] == "image/png"))
        {
            $directorio = 'images/';
            move_uploaded_file($_FILES['portada']['tmp_name'],$directorio.$imagen);
        }
        else
        {
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        if($imagen == !NULL) echo "La imagen es demasiado grande ";
    }

    $sentencia = 'UPDATE libros 
        SET titulo = :titulo, disponible = :disponible,
        id_editorial = :id_editorial, id_categoria = :id_categoria, 
        id_autor = :id_autor ' . (!empty($imagen) ? ', portada = :portada ' : '') .
        'WHERE id_libro = :id_libro';
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare($sentencia);

    $parametros = [
        'id_libro'     => $id_libro,
        'titulo'       => $titulo,
        'disponible'   => $disponible,
        'id_editorial' => $id_editorial,
        'id_categoria' => $id_categoria,
        'id_autor'     => $id_autor
    ];

    if ( !empty($imagen) ) {
        $parametros['portada'] = $imagen;
    }
    // Ejecuta UPDATE con los datos
    $miUpdate->execute( $parametros );
    $_SESSION["mensajes"] = "Se ha modificado corectamente";
    echo $imagen;
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM libros WHERE id_libro = :id_libro');
    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        'id_libro' => $id_libro,
    ]);
    // Obtiene un resultado
    $datos = $miConsulta->fetch();
    
    $stmt = $miPDO-> prepare("SELECT * FROM editorial;");
    $stmt-> execute();
    $editoriales = $stmt->fetchAll();
    
    $stmt = $miPDO-> prepare("SELECT * FROM categoria;");
    $stmt-> execute();
    $categorias = $stmt->fetchAll();
    
    $stmt = $miPDO-> prepare("SELECT * FROM autor;");
    $stmt-> execute();
    $autores = $stmt->fetchAll();
    
    echo $blade -> run("libros.modificar", [
        "datos"     => $datos,
        "editoriales" => $editoriales,
        "categorias" => $categorias,
        "autores"     => $autores
    ]);
}

?>
