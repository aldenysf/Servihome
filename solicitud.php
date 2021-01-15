<?php
session_start();

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

if (!$conexion){
    header('Location: error.php');
}

$id_articulo = id_articulo( $_POST['id_articulo']);

$datos_user= (obtener_usuario_por_id($_SESSION['usuario']['id'],$conexion));

$conexion = conexion($bd_config);

$post = obtener_servicio_por_id($id_articulo,$conexion);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    $id_costumer = (int)$_SESSION['usuario']['id'];
    $titulo = limpiarDatos($post['titulo']);
    $fecha = new DateTime();
    $fecha = $fecha->format('Y-m-d H:i:s');
    $direccion = $_POST['direccion'];
    $telefono = (int)$_POST["telefono"];
    $mail = $_POST["correo"];
    $texto=$_POST["texto"];
    $id_estado= 4;
    $id_servicio = $post['id'];
    $id_master = $post['user_id'];
    $precio = $post['precio'];

    //insert en la BD
    $statement = $conexion->prepare(
        'INSERT INTO solicitud (id, id_servicio,id_costumer, id_master, titulo, precio, fecha, direccion, telefono, mail, texto, id_estado) 
                           VALUES
                                (null, :id_servicio,  :id_costumer, :id_master, :titulo, :precio, :fecha, :direccion, :telefono, :mail, :texto, :id_estado)'
    );

    $statement->execute(array(':id_servicio' => $id_articulo,
        ':id_costumer' => $id_costumer,
        ':id_master'=> $id_master,
        ':titulo' => $titulo,
        ':precio' => $precio,
        ":fecha" => $fecha,
        ":direccion" =>$direccion,
        ":telefono" =>$telefono,
        ":mail" => $mail,
        ":texto" => $texto,
        ":id_estado" => $id_estado ));

    header('Location: '. RUTA);

}

if(!$post){
    header('Location: error.php');
    //header('Location: '. RUTA);
}
