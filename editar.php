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
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $categoria_input= $_POST['Categoria'];
    $id = limpiarDatos($_POST['id']);
    $precio = $_POST['precio'];
    $cobro = $_POST['cobro'];
    $thumb_guardada = obtener_nombre_thumb($_POST['id']);

    //Hasheo de File
    $file_name =$_FILES['thumb']['name'];
    $file_size=$_FILES['thumb']['size'];
    $file_tmp= $_FILES['thumb']['tmp_name'];


    $data = file_get_contents($file_tmp);


    $thumb = $_FILES['thumb']['tmp_name'];
    $rutaImagen = pathinfo($_FILES['thumb']['name']);





    // Si hay algún dato vacio
    if ($titulo == "" || $texto == "" || $precio == "" || $extracto == "" ){
        $errores .= '<li>Completa todos los datos.</li>';

      $post = obtener_post_por_id($id, $conexion);
        echo '<script language="javascript">';
        echo 'alert("Por favor intenta nuevamente")';
        echo '</script>';
      header('Location: ' . RUTA. "editar.php?id=$id");

    }



    if($errores == "") {
        //SI el usuario no adjunta archivo...
        if(empty($file_name)){

            ///insert
            $statemente = $conexion->prepare(
                'UPDATE servicio SET titulo = :titulo, extracto = :extracto, texto = :texto, precio = :precio, thumb = :thumb, id_categoria = :id_categoria, id_tipo_cobro = :id_tipo_cobro 
        WHERE id = :id'
            );
            $statemente->execute(array(':titulo' => $titulo, ':extracto' => $extracto, ':texto' => $texto, ':precio' => $precio,
                ':thumb' => $thumb_guardada,':id_categoria' => $categoria_input,
                ':id_tipo_cobro' => $cobro,':id' => $id));

            header('Location: '. RUTA);

        }else{
            $thumb64 = base64_encode($data);
            ///insert
            $statemente = $conexion->prepare(
                'UPDATE servicio SET titulo = :titulo, extracto = :extracto, texto = :texto, precio = :precio, thumb = :thumb, id_categoria = :id_categoria, id_tipo_cobro = :id_tipo_cobro 
        WHERE id = :id'
            );
            $statemente->execute(array(':titulo' => $titulo, ':extracto' => $extracto, ':texto' => $texto, ':precio' => $precio,
                ':thumb' => $thumb64,':id_categoria' => $categoria_input,
                ':id_tipo_cobro' => $cobro,':id' => $id));

            header('Location: '. RUTA);
        }
    }
}else {
    $id_articulo = id_articulo($_GET['id']);
    if (empty($id_articulo)) {
       header('Location: ' . RUTA);
    }

    $post = obtener_servicio_por_id($id_articulo, $conexion);

    if (!$post) {
        //header('Location: ' . RUTA);
    }
    $post = $post[0];
}


require 'views/editar_servicio.view.php';