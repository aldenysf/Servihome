<?php session_start();
require 'config.php';
require '../functions.php';
//Index Del admin

$conexion = conexion($bd_config);

comprobarSession();

if (!$conexion){
    header('Location: error.php');
}
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);



/*
if($_SESSION['admin']){

}
*/

require '../views/admin_index.view.php';