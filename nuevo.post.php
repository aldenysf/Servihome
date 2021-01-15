<?php  session_start();
require 'admin/config.php';
require 'functions.php';


$exito = '';
$errores = '';

$conexion = conexion($bd_config);

if (!$conexion){
    header('Location: error.php');
}

//obtener categorías
$categorias = obtener_todas_categorias($conexion);

    $id_usuario = $_SESSION['usuario']['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombrePost = limpiarDatos($_POST['nombrePost']);
    $texto = $_POST['texto'];
    $categoria_input= $_POST['Categoria'];
    $fecha = new DateTime();
    $fecha = $fecha->format('Y-m-d H:i:s');



    if ($nombrePost == "" || $texto == ""){
        $errores .= '<li>Completa todos los datos.</li>';
    }

if($errores == ""){
    //insert en la BD
    $statement = $conexion->prepare(
        'INSERT into post_user (id, post_name, fecha, texto ,id_categoria, id_user)  
                           VALUES (null, :post_name, :fecha, :texto,:id_categoria, :id_user)'
    );

    $statement->execute(array(':post_name' => $nombrePost,':fecha' => $fecha ,':texto'=> $texto, ':id_categoria' => $categoria_input, ':id_user' => $id_usuario));


    $exito .= '<li>Post exitosamente</li>';
    header('Location: '. RUTA . 'costumer_user.php' );
}

}


require 'views/nuevo.post.view.php';



