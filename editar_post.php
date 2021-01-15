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

//funciones de para llamar categorías y tipo de cobro desde la BD
$categorias = obtener_todas_categorias($conexion);
$tipo_cobro= obtener_tipos_cobros($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = limpiarDatos($_POST['titulo']);
    $texto = $_POST['texto'];
    $categoria_input= $_POST['categoria'];
    $id = limpiarDatos($_POST['id']);

    if ($titulo == "" || $texto == ""){
        $errores .= '<li>Completa todos los datos.</li>';

        $post = obtener_post_por_id($id, $conexion);
        header('Location: ' . RUTA. "editar_post.php?id=$id");
    }
    if($errores == "") {
        $statemente = $conexion->prepare(
            'UPDATE post_user SET post_name = :titulo, texto = :texto, id_categoria = :id_categoria WHERE id = :id');

        $statemente->execute(array(':titulo' => $titulo, ':texto' => $texto, ':id_categoria' => $categoria_input, ':id' => $id));

        header('Location: ' . RUTA. "costumer_user.php");
    }
}
else {
    $id_articulo = id_articulo($_GET['id']);
    if (empty($id_articulo)) {
        header('Location: ' . RUTA);
    }

    $post = obtener_post_por_id($id_articulo, $conexion);

    if (!$post) {
        //header('Location: ' . RUTA);
    }
    $post = $post[0];
}


require 'views/editar_post.view.php';