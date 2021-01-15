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


$rechazado = 7;


$statemente = $conexion->prepare(
    'UPDATE servicoatencion SET id_estado = :estado 
        WHERE id = :id'
);
$statemente->execute(array(':estado' => $rechazado , ":id" => $id_solicitud));


header('Location: '. RUTA . "serviciosActuales.php");



require 'serviciosActuales.php';