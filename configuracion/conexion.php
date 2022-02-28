<?php
// Conexion base de datos.
$host = 'localhost';
$base_de_datos = 'biblioteca';
$usuario = 'root';
$password = '';

try {
    $dns = "mysql:host=$host;dbname=$base_de_datos;";
    $miPDO = new PDO($dns, $usuario, $password);
  } catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
  }

?>