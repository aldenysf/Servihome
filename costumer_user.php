<?php session_start();

require 'admin/config.php';
require 'functions.php';

//comprobarSession();

$conexion = conexion($bd_config);

if (!$conexion){
    header('Location: error.php');
}
$categorias = obtener_todas_categorias($conexion);


$posts = obtener_post_por_user_id($_SESSION['usuario']['id'], $blog_config['post_por_pagina'], $conexion);


$categorias = obtener_todas_categorias($conexion);


$nombr_usuario = ucfirst($_SESSION['usuario']['name']);

require 'views/costumer_user.view.php';