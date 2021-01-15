<?php  session_start();


require 'admin/config.php';
require 'functions.php';

comprobarSession();


$conexion = conexion($bd_config);
if (!$conexion){
    header('Location: error.php');
}



if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id_solicitud = id_articulo($_GET['id']);
    if (empty($id_solicitud)) {
        echo "Error";
        die();
        //header('Location: ' . RUTA);
    }
    $post = obtener_solicitud_por_id($id_solicitud, $conexion);
    var_dump($post);

    $titulo= $post['titulo'];
    $id_servicio= $post['id_servicio'];
    $id_costumer = $post['id_costumer'];
    $id_master= $post['id_master'];
    $precio = $post['precio'];
    $fecha = $post['fecha'];
    $direccion= $post['direccion'];
    $texto = $post['texto'];
    $id_estado = 2;



    $estado = 2;



    $statemente = $conexion->prepare('UPDATE solicitud SET id_estado = :estado WHERE id = :id'
    );
    $statemente->execute(array(":id" => $id_solicitud, ":estado" => $estado));




    $statemente = $conexion->prepare('INSERT INTO servicoatencion values
    (NULL, :id_servicio, :id_costumer, :id_master, :titulo, :precio, :fecha, :direccion, :texto, :id_estado, :id_solicitud)');
    $statemente->execute(array(":id_servicio" => $id_servicio, ":id_costumer" => $id_costumer, ":id_master" => $id_master,
        ":titulo" => $titulo, ":precio" => $precio, ":fecha" => $fecha,
        ":direccion" => $direccion, ":texto" => $texto, ":id_estado" => $id_estado, ":id_solicitud" => $id_solicitud ));


    //Enviar a asistencia ya generada
    header('Location: '. RUTA . "costumer_serviciosActuales.php");





}

require 'views/master_solicitud.view.php';