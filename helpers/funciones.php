<?php

function tienePermisos($id) {
    if ($_SESSION['id_usuario'] != $id && !$_SESSION['tipo']) {
        header('Location:../index.php');
    }
}

function soloAdmin() {
    if (!$_SESSION['tipo']) {
        header('Location:../index.php');
    }
}