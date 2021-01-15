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
$post = obtener_servicoatencion_por_master_id($id_solicitud, $conexion);


//Si el usuario es tipo Master (M) se cambia el estado a Cancelado por Trabajador
if(($_SESSION['usuario']["type_user"]) == "M") {

    $rechazado = 8;


    $statemente = $conexion->prepare(
        'UPDATE servicoatencion SET id_estado = :estado 
        WHERE id = :id'
    );
    $statemente->execute(array(':estado' => $rechazado, ":id" => $id_solicitud));


    header('Location: ' . RUTA . "serviciosActuales.php");
}else{

    $rechazado = 8;


    $statemente = $conexion->prepare(
        'UPDATE servicoatencion SET id_estado = :estado 
        WHERE id = :id'
    );
    $statemente->execute(array(':estado' => $rechazado, ":id" => $id_solicitud));


    header('Location: ' . RUTA . "costumer_serviciosActuales.php");
}


require 'serviciosActuales.php';