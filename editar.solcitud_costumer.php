<?php  session_start();



require 'admin/config.php';
require 'functions.php';

comprobarSession();

$exito = '';
$errores = '';

$conexion = conexion($bd_config);
if (!$conexion){
    header('Location: error.php');
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_solicitud = id_articulo($_POST['id']);
    if (empty($id_solicitud)) {
        echo "Error";
        die();
        //header('Location: ' . RUTA);
    }
    $post = obtener_solicitud_por_id($id_solicitud, $conexion);

    $texto =limpiarDatos($_POST['texto']);
    $direccion = limpiarDatos($_POST['direccion']);
    $hora = limpiarDatos($_POST['hora2']);
    $fecha2= limpiarDatos($_POST['fecha2']);
    $fecha_y_hora = $fecha2. ' '.$hora.":00" ;
    $estado = 4;



    if ($hora == "" || $direccion == "" || $texto == "" || $fecha2 == ""){
        $errores .= '<li>Completa todos los datos.</li>';

    }

    if($errores == "") {
        $statemente = $conexion->prepare(
            'UPDATE solicitud SET fecha = :fecha, id_estado = :estado, direccion = :direccion, texto = :texto
        WHERE id = :id'
        );
        $statemente->execute(array(':fecha' => $fecha_y_hora, ":id" => $id_solicitud, ":estado" => $estado, ":texto" => $texto, ":direccion" => $direccion));

        header('Location: ' . RUTA . "costumer_solicitud.php");
    }

}else {
    $id_solicitud = id_articulo($_GET['id']);
    if (empty($id_solicitud)) {
        header('Location: ' . RUTA);
    }

    $post = obtener_solicitud_por_id($id_solicitud, $conexion);

    if (!$post) {
        //header('Location: ' . RUTA);
    }
    //$post = $post[0];
}
require 'views/editar.solcitud_costumer.view.php';