<?php

session_start();

header('Refresh: 180');

require 'admin/config.php';
require 'functions.php';

//comprobarSession();

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: error.php');
}

$posts = obtener_servicoatencion_por_costumer_id($_SESSION['usuario']['id'], $conexion);


$nombr_usuario = ucfirst($_SESSION['usuario']['name']);


require 'views/costumer_serviciosActuales.view.php';