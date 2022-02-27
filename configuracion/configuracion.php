<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header('Location:../index.php');
}

require "conexion.php";
require "../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../views';
$cache = '../cache';

$blade = new BladeOne($views, $cache);

$root_path = "";


?>