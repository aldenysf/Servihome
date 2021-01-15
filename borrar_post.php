<?php session_start();

require 'admin/config.php';
require 'functions.php';

comprobarSession();

$conexion = conexion($bd_config);

comprobarSession();

if (!$conexion){
    header('Location: error.php');
}

$id = limpiarDatos($_GET['id']);
if (!$id){
    header('Location: error.php');
}

//Elimina el post de la BD
$statement = $conexion->prepare('DELETE FROM post_user WHERE id = :id');
$statement->execute(array(':id' => $id));

header('Location: ' . RUTA . "costumer_user.php");
