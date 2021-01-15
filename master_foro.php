
<?php session_start();

require 'admin/config.php';
require 'functions.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die();
}
//-------------


$conexion = conexion($bd_config);


if (!$conexion) {
    header('Location: error.php');
}
$posts = obtener_post_customer_por_fecha($blog_config['post_por_pagina'], $conexion);

$categorias = obtener_todas_categorias($conexion);


$nombr_usuario = ucfirst($_SESSION['usuario']['name']);


//-----------------------------
//$nombr_usuario = ucfirst($_SESSION['usuario']['name']);
//session_destroy();
require 'views/master_foro.view.php';
