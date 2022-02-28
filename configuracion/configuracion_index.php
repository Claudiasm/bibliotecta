<?php
session_start();

require "conexion.php";
require "vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = 'views';
$cache = 'cache';

$blade = new BladeOne($views, $cache);

if (!isset($_SESSION['id_usuario'])) {
    header('Location:login.php');
}

$root_path = "../";

?>