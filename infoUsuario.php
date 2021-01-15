<?php session_start();

require 'admin/config.php';
require 'functions.php';

//comprobarSession();

$conexion = conexion($bd_config);

if (!$conexion){
    header('Location: error.php');
}

$id = $_GET['id'];

$usuario = obtener_usuario_por_id($id, $conexion);

require 'views/infoUsuario.view.php';
?>
