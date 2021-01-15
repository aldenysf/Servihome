<?php session_start();
require 'admin/config.php';
require 'functions.php';

$exito = '';
$errores = '';

comprobarSession();

$conexion = conexion($bd_config);

if (!$conexion){
    header('Location: cerrar.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_articulo = id_articulo($_GET['id']);

    $datos_user = (obtener_usuario_por_id($_SESSION['usuario']['id'], $conexion));

    $conexion = conexion($bd_config);

    $post = obtener_servicio_por_id($id_articulo, $conexion);

    if(!$post){
        header('Location: error.php');
        //header('Location: '. RUTA);
    }

    $post= $post[0];


    require 'views/single.view.php';
}


// en caso de ser POST el metodo de consulta
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id_articulo = id_articulo( $_POST['id_servicio']);

    $datos_user = (obtener_usuario_por_id($_SESSION['usuario']['id'], $conexion));

    $conexion = conexion($bd_config);

    $post = obtener_servicio_por_id($id_articulo, $conexion);


    $posteo = $post;
    $id_costumer = (int)$_SESSION['usuario']['id'];
    $titulo = limpiarDatos($_POST['titulo2']);
    $fecha = new DateTime();
    $fecha = $fecha->format('Y-m-d H:i:s');
    $direccion = $_POST['direccion'];
    $telefono = (int)$_POST["telefono"];
    $mail = $_POST["correo"];
    $texto=$_POST["texto"];
    $id_estado= 4;
    $id_servicio = (int)limpiarDatos($_POST['id_servicio']);
    $id_master = (int)$_POST['user_id2'];
    $precio = (int)limpiarDatos($_POST['precio2']);
    $hora = limpiarDatos($_POST['hora']);
    $fecha2= limpiarDatos($_POST['fecha2']);
    $fecha_y_hora = $fecha2. ' '.$hora.":00" ;

    // Si hay algún dato vacio
    if ($direccion == "" || $fecha2 == "" || $hora == "" || $texto == "" ){
        $errores .= '<li>Completa todos los datos.</li>';

        $post = obtener_servicio_por_id($id_servicio, $conexion);
       echo '<script language="javascript">';
        echo 'alert("Por favor intenta nuevamente")';
        echo '</script>';
        header('Location: ' . RUTA. "single.php?id=$id_servicio");
    }else    {
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

    //header('Location: '. RUTA);

    if(!$post){
        header('Location: error.php');
        //header('Location: '. RUTA);
    }else{
        header('Location: '. RUTA.'costumer_solicitud.php' );
    }
}
    $post= $post[0];

    //echo "estoy aca";
    //die();

    require 'views/single.view.php';
}


