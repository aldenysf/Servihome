<?php
session_start();

require 'admin/config.php';
require 'functions.php';

comprobarSession();
$exito = '';
$errores = '';

$conexion = conexion($bd_config);



if (!$conexion) {
    header('Location: error.php');
}
if($_GET['id'] != $_SESSION['usuario']['id']){
    header('Location: cerrar.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $usuario = obtener_usuario_por_id($id, $conexion);
}else{
    $id = $_POST['id'];

    $usuario = obtener_usuario_por_id($id, $conexion);

    $nombre = limpiar_datos(RemoveSpecialChar($_POST['nombre']));
    $lastname1 = limpiar_datos(RemoveSpecialChar($_POST['apellido1']));
    $lastname2 = limpiar_datos(RemoveSpecialChar($_POST['apellido2']));
    $telefono= limpiar_datos(RemoveSpecialChar($_POST['telefono']));


    if ($nombre == "" || $lastname1 == "" || $lastname2 == "" || $telefono == "") {
        $errores .= '<li>Completa todos los datos.</li>';
        $message = "Completa todos los datos.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: ' . RUTA . "master_user.php");


        if (!is_numeric($telefono) || strlen($telefono) >= 13) {
            $errores .= '<li>El numero telefonico debe ser menor a 13.</li>';
            $message = "El numero telefonico debe ser menor a 13.";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: ' . RUTA . "master_user.php");
        }
    }

    if($errores == ""){
        $statemente = $conexion->prepare(
            'UPDATE user_master SET name = :namess, lastname_1 = :lastname_1, lastname_2 = :lastname_2 , telefono = :telefono WHERE id = :id');

        $statemente->execute(array(':namess' => $nombre, ':lastname_1' => $lastname1, ':lastname_2' => $lastname2,':telefono' => $telefono,':id' => $id));
        header('Location: ' . RUTA. "edit_personal_info.php?id=$id");
        $message = "Se actualizaron los datos del usuario correctamente.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>alert('alert text')</script>";


    }

}
require "views/costumer_edit_personal_info.view.php";