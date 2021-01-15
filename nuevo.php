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
$categorias = obtener_todas_categorias($conexion);
$tipo_cobro= obtener_tipos_cobros($conexion);

$id_usuario = $_SESSION['usuario']['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = limpiarDatos($_POST['titulo']);
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $categoria_input = $_POST['Categoria'];
    $precio = $_POST['precio'];
    $cobro = $_POST['cobro'];
    $fecha = new DateTime();
    $fecha = $fecha->format('Y-m-d H:i:s');





    //echo $partes_ruta['extension'], "\n";
    $file_name = $_FILES['thumb']['name'];
    $file_size = $_FILES['thumb']['size'];
    $file_tmp = $_FILES['thumb']['tmp_name'];
    $data = file_get_contents($file_tmp);
    // $thumb = $_FILES['thumb']['tmp_name'];
    $thumb64 = base64_encode($data);
    $rutaImagen = pathinfo($_FILES['thumb']['name']);
    $extencion =  $rutaImagen['extension'];
    //$archivo_subido =  $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
    //move_uploaded_file($thumb, $archivo_subido);
    $nombre_formulario = $_FILES['thumb']['name'];




    if ($titulo == "" || $extracto == "" || $texto == "" || $precio == "" || $_FILES['thumb']['tmp_name'] == ""){
        $errores .= '<li>Completa todos los datos.</li>';

    }

    /*
    De imagen: jpg, gif, bmp, png, etc.
    De vídeo: avi, mp4, mpeg, mwv, etc.
    De ejecución o del sistema: exe, bat, dll, sys, etc.
    De audio: mp3, wav, wma, etc.
    De archivo comprimido: zip, rar, tar, etc.
    De lectura: pdf, epub, azw, ibook, etc
    */

    //||  $extencion != "jpg" || $extencion != "jpeg"
    if($extencion == "csv" or $extencion == "xml" or $extencion == "pdf" or $extencion == "gif" or $extencion == "wav" or $extencion == "xml"
        or $extencion == "rar" or $extencion == "zip" or $extencion == "exe" or $extencion == "mp4" or $extencion == "xlsx"
       or $extencion == "avi" or $extencion == ""){
        $errores .= '<li>Verifique el formato de la imagen.</li>';
    }
   /* if ($extencion != "png"){
        $errores .= '<li>Verifique el formato de la imagen.</li>';
    }
    if ($extencion != "png"){
        $errores .= '<li>Verifique el formato de la imagen.</li>';
    }*/


    if($errores == ""){
    //insert en la BD
    $statement = $conexion->prepare(
        'INSERT into servicio (id, titulo, extracto, fecha ,texto, precio, thumb, user_id, id_categoria,  id_tipo_cobro)  
    VALUES (null, :titulo, :extracto, :fecha, :texto,:precio, :thumb, :user_id, :id_categoria, :id_tipo_cobro )'
    );

    $statement->execute(array(':titulo' => $titulo, ':extracto' => $extracto, ':fecha' => $fecha, ':texto' => $texto,
        ':precio' => $precio, ':thumb' => $thumb64,
        ':user_id' => $id_usuario, ':id_categoria' => $categoria_input, ':id_tipo_cobro' => $cobro));

    header('Location: ' . RUTA. 'master_user.php');
}
}else{

}


require 'views/nuevo.view.php';



