<?php  session_start();


require 'admin/config.php';
require 'functions.php';

comprobarSession();


$conexion = conexion($bd_config);
if (!$conexion){
    header('Location: error.php');
}




    $id_solicitud = id_articulo($_GET['id']);
    if (empty($id_solicitud)) {
        echo "Error";
        die();
        //header('Location: ' . RUTA);
    }
    $post = obtener_solicitud_por_id($id_solicitud, $conexion);

    //Si el usuario es tipo Master (M) se cambia el estado a Rechazado por Trabajador
if(($_SESSION['usuario']["type_user"]) == "M") {
    $rechazado = 1;

    $statemente = $conexion->prepare(
        'UPDATE solicitud SET id_estado = :estado 
        WHERE id = :id'
    );
    $statemente->execute(array(':estado' => $rechazado, ":id" => $id_solicitud));


    header('Location: ' . RUTA . "master_solicitud.php");

}else{
    //Si el usuario es tipo Cliente (C) se cambia el estado a Rechazado por Cliente
    $rechazado = 5;
    $statemente = $conexion->prepare(
        'UPDATE solicitud SET id_estado = :estado 
        WHERE id = :id'
    );
    $statemente->execute(array(':estado' => $rechazado, ":id" => $id_solicitud));


    header('Location: ' . RUTA . "costumer_solicitud.php");

}

require 'master_solicitud.php';