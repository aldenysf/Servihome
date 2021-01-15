<?php session_start();
require 'admin/config.php';
require 'functions.php';


$exito = '';
$errores = '';

comprobarSession();


$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');


}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id_articulo = id_articulo($_GET['id']);

    $servicios = obtener_servicio_por_user_id($_SESSION['usuario']['id'], $blog_config['post_por_pagina'], $conexion);


    $post = obtener_post_por_id($id_articulo, $conexion);

    if (!$post) {
        header('Location: error.php');
    }

    $post = $post[0];

    require 'views/single.costumer.view.php';
}


// Se Ejecuta si el Metodo de respuesta es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Id Servicio MASTER
    $id_articulo = limpiarDatos(id_articulo($_POST['id_servicio']));

    //INFO del  MASTER
    $user_master = (obtener_usuario_por_id($_SESSION['usuario']['id'], $conexion));

    $conexion = conexion($bd_config);

    //INFO DEL SERVICO
    $post = obtener_servicio_por_id($id_articulo, $conexion);

    //ID del  COSTUMER
    $id_costumer = $_POST['id_costumer'];
    //INFO del  COSTUMER
    $user_costumer = (obtener_usuario_por_id($id_costumer, $conexion));


    $titulo = $post[0]['titulo'];
    $direccion = null;
    $telefono = $user_costumer['telefono'];
    $mail = $user_costumer['mail'];
    $texto = $_POST["texto2"];
    $id_estado = 3;
    $id_servicio = $id_articulo;
    $id_master = $user_master['id'];
    $precio = limpiarDatos($post[0]['precio']);
    $hora = limpiarDatos($_POST['hora']);
    $fecha2 = limpiarDatos($_POST['fecha2']);
    $fecha_y_hora = $fecha2 . ' ' . $hora . ":00";



    // Si hay algún dato vacio
    if ( $fecha2 == "" || $hora == "" ) {
        $errores .= '<li>Completa todos los datos.</li>';
        var_dump($hora . $fecha2);

        $post = obtener_servicio_por_id($id_servicio, $conexion);

        header('Location: ' . RUTA . "single.costumer.php?id=$id_servicio");
    }else{

    //insert en la BD
    $statement = $conexion->prepare(
        'INSERT INTO solicitud (id, id_servicio,id_costumer, id_master, titulo, precio, fecha, direccion, telefono, mail, texto, id_estado) 
                           VALUES
                                (null, :id_servicio,  :id_costumer, :id_master, :titulo, :precio, :fecha, :direccion, :telefono, :mail, :texto, :id_estado)'
    );

    $statement->execute(array(':id_servicio' => (int)$id_articulo,
        ':id_costumer' => $id_costumer,
        ':id_master' => $id_master,
        ':titulo' => $titulo,
        ':precio' => $precio,
        ":fecha" => $fecha_y_hora,
        ":direccion" => $direccion,
        ":telefono" => $telefono,
        ":mail" => $mail,
        ":texto" => $texto,
        ":id_estado" => $id_estado));

    header('Location: ' . RUTA. 'master_solicitud.php');


        if(!$post){
            header('Location: error.php');
            //header('Location: '. RUTA);
        }else{
            header('Location: '. RUTA);
        }

    }

    $post= $post[0];



    require 'views/single.costumer.view.php';
}