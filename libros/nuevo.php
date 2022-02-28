<?php

require "../configuracion/configuracion.php";
require "../helpers/funciones.php";
soloAdmin();

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Recogemos variables
    $titulo       = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
    $disponible   = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;
    $portada      = isset($_REQUEST['portada']) ? $_REQUEST['portada'] : null;
    $id_editorial = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;
    $id_categoria = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : null;
    $id_autor     = isset($_REQUEST['id_autor']) ? $_REQUEST['id_autor'] : null;

    $portada = $_FILES['portada']['name'];
    $tipo    = $_FILES['portada']['type'];
    $tamano  = $_FILES['portada']['size'];

    if (!empty($portada) && ($_FILES['portada']['size'] <= 200000000)) {
        if (($_FILES["portada"]["type"] == "image/gif")
            || ($_FILES["portada"]["type"] == "image/jpeg")
            || ($_FILES["portada"]["type"] == "image/jpg")
            || ($_FILES["portada"]["type"] == "image/png"))
        {
            $directorio = 'images/';
            move_uploaded_file($_FILES['portada']['tmp_name'],$directorio.$portada);
        }
        else
        {
            echo "No se puede subir una imagen con ese formato ";
        }
    } else {
        if($portada  == !NULL) echo "La imagen es demasiado grande ";
    }
   
    // Prepara UPDATE
    $stmt = $miPDO->prepare('INSERT INTO libros (titulo, disponible, portada ,id_editorial ,id_categoria ,id_autor)
                                     VALUES (:titulo, :disponible, :portada, :id_editorial, :id_categoria, :id_autor)');
    // Ejecuta UPDATE con los datos
    try {
        $stmt->execute(
            [
                'titulo'       => $titulo,
                'disponible'   => $disponible,
                'portada'      => $portada == '' ? null : $portada ,
                'id_editorial' => $id_editorial,
                'id_categoria' => $id_categoria,
                'id_autor'     => $id_autor
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

$stmt = $miPDO-> prepare("SELECT * FROM editorial;");
$stmt-> execute();
$editoriales = $stmt->fetchAll();

$stmt = $miPDO-> prepare("SELECT * FROM categoria;");
$stmt-> execute();
$categorias = $stmt->fetchAll();

$stmt = $miPDO-> prepare("SELECT * FROM autor;");
$stmt-> execute();
$autores = $stmt->fetchAll();

echo $blade -> run("libros.nuevo", [
    "editoriales" => $editoriales,
    "categorias"  => $categorias,
    "autores"     => $autores
]);
?>

