<?php


function conexion($bd_config)
{
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=' . $bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

function clearString($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$punto = ".";
    return preg_replace("/[^A-Za-z0-9\--]/", '', $string); // Removes special chars.
}
function RemoveSpecialChar($str) {

    // Using str_replace() function
    // to replace the word
    $res = str_replace( array( '\'', '"',
        ',' , ';','', '<', '>','.','?','¿','%','$','#','&','!','¡','-',':','=','°'), ' ', $str);

    // Returning the result
    return $res;
}

function obtener_tipo_de_cobro_por_id($id){
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto2','root' ,'');
    $sentencia = $conexion->prepare("SELECT cobro FROM tipo_cobro where id =  $id ");
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    return  $resultado[0];
}

function limpiar_datos($datos)
{
    $datos = trim($datos);

    $datos = stripcslashes($datos);

    $datos = htmlspecialchars($datos);

    return $datos;
}

function obtener_servicoatencion_por_master_id($id, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM servicoatencion where id_master =  $id ");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_servicoatencion_por_costumer_id($id, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM servicoatencion where id_costumer =  $id ");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_solicitud_por_master_id($id, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM solicitud where id_master =  $id ");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_solicitud_por_costumer_id($id, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM solicitud where id_costumer =  $id ");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_solicitud_por_id($id, $conexion){
    $statement = $conexion->prepare("SELECT * FROM solicitud where id =  $id LIMIT 1 ");
    $statement->execute();
    $resultado = $statement->fetch();
    $solicitud = $resultado;

    return $solicitud;
}

function obtener_nombre_estado_por_id($id){
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto2','root' ,'');
    $statement = $conexion->prepare('SELECT estado FROM estado WHERE id = :id');
    $statement->bindParam(':id', $id);
    $statement->execute();
    $resultado = $statement->fetch();
    $nombre_estado = $resultado;

    return  $nombre_estado['estado'];
}


function obtener_servicio_por_user_id($id, $post_por_pagina, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM servicio where user_id = $id LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();

}

function obtener_post_por_user_id($id, $post_por_pagina, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM post_user where id_user = $id");
    $sentencia->execute();
    return $sentencia->fetchAll();

}


function id_articulo($id)
{
    return (int)limpiar_datos($id);
}

function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripcslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_post($post_por_pagina, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM servicio ORDER BY fecha DESC LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_post_customer($post_por_pagina, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM post_user  LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_post_customer_por_fecha($post_por_pagina, $conexion)
{
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM post_user ORDER BY fecha DESC LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function obtener_nombre_usuario($id_usuario){
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto2','root' ,'');
    $statement = $conexion->prepare('SELECT name, lastname_1 FROM user_master WHERE id = :id_usuario');
    $statement->bindParam(':id_usuario', $id_usuario);
    $statement->execute();
    $resultado = $statement->fetch();
    $user_name = $resultado;
   // ucfirst($user_name);

    return  ucfirst($user_name['name']) .' '. ucfirst($user_name['lastname_1']) ;

}

function obtener_post_por_id($id, $conexion)
{
    $resultado = $conexion->query("SELECT * FROM post_user WHERE id = $id LIMIT 1");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}

function obtener_usuario_por_id($user_id, $conexion){
    $statement = $conexion->prepare('SELECT * FROM user_master WHERE id = :id');
    $statement->bindParam(':id', $user_id);
    $statement->execute();
    $resultado = $statement->fetch();
    $usuario = $resultado;

    return $usuario;
}

function obtener_servicio_por_id($id, $conexion)
{
    $resultado = $conexion->query("SELECT * FROM servicio WHERE id = $id LIMIT 1");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}

function obtener_categoria($id_categoria){
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto2','root' ,'');
    $statement = $conexion->prepare('SELECT categoria FROM categoria WHERE id = :id_categoria');
    $statement->bindParam(':id_categoria', $id_categoria);
    $statement->execute();
    $resultado = $statement->fetch();
    $categoria = $resultado;

    return  $categoria['categoria'] ;
}
function obtener_nombre_thumb($id_articulo){
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto2','root' ,'');
    $statement = $conexion->prepare('SELECT thumb FROM servicio WHERE id = :id_articulo LIMIT 1');
    $statement->bindParam(':id_articulo', $id_articulo);
    $statement->execute();
    $resultado = $statement->fetch();
  //  $thumb_nombre = $resultado;    $thumb_nombre['nombre_thumb']

    return $resultado[0];
}

function obtener_todas_categorias($conexion){
    $sentencia = $conexion->prepare("SELECT * FROM categoria" );
    $sentencia->execute();

    return $sentencia->fetchAll();
}

function obtener_tipos_cobros($conexion){
    $sentencia = $conexion->prepare("SELECT * FROM tipo_cobro" );
    $sentencia->execute();

    return $sentencia->fetchAll();
}

function numero_paginas_servicio($post_por_pagina, $conexion)
{
    //4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta
    $total_post = $conexion->prepare('SELECT COUNT(id) as total from servicio');
    $total_post->execute();
    $total_post= $total_post->fetch()['total'];
    //var_dump($total_post);
    //die();
    //SELECT COUNT(id) as total from servicio
    //5. Calculamos el numero de paginas que habra en la paginacion
    $numero_paginas = ceil((int)$total_post / $post_por_pagina);
    return $numero_paginas;
}

function numero_paginas_post($post_por_pagina, $conexion)
{
    //4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta
    $total_post = $conexion->prepare('SELECT COUNT(id) as total from post_user');
    $total_post->execute();
    $total_post= $total_post->fetch()['total'];
    //var_dump($total_post);
    //die();
    //SELECT COUNT(id) as total from servicio
    //5. Calculamos el numero de paginas que habra en la paginacion
    $numero_paginas = ceil((int)$total_post / $post_por_pagina);
    return $numero_paginas;
}


function fecha($fecha)
{
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $ano = date('Y', $timestamp);
    $hora = date('H:i:s', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " del $ano";
    return $fecha;
}

function fecha_con_hora($fecha)
{
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $ano = date('Y', $timestamp);
    $hora = date('H:i:s', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " del $ano a las $hora";
    return $fecha;
}

function comprobarSession(){
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . RUTA);
    }
}

