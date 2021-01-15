ARTICULOS


<?php session_start();

require 'admin/config.php';
require 'functions.php';


$conexion = conexion($bd_config);

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die();
}

//comprobarSession();

if (!$conexion){
    header('Location: error.php');
}
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

$categorias = obtener_todas_categorias($conexion);


$nombr_usuario = ucfirst($_SESSION['usuario']['name']);
//session_destroy();
require 'views/master_foro.view.php';
w


-----------------------------------------
Vista


<?php require 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Foro Trabajador</title>
</head>
<body>
<div class="contenedor">
    <div class="post">
        <h1>Portal de Trabajadores </h1>
        <h1 class="asegurate "><?php echo $nombr_usuario;?> </h1>
        <a href="nuevo.php" class="btn">Nuevo Post</a>
    </div>
</div>

<div class="contenedor">
    <?php foreach ($posts as $post):?>
        <div class="post">
            <article style="margin: auto">
                <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'];  ?></a></h2>
                <hr/>
                <p class="fecha" style="margin-top:10px;"><em>Publicado: &#160; &#160;</em><?php echo fecha($post['fecha']);  ?></p>
                <p class="fecha" >Posteado por: <?php  echo obtener_nombre_usuario($post['user_id']);?></p>
                <p class="fecha" >Precio: <?php  echo $post['precio'];?></p>
                <p class="fecha" >Categoría: <?php  echo obtener_categoria($post['id_categoria']);?></p>
                <div class="thumb">
                    <a  href="single.php?id=<?php echo $post['id']; ?>">
                        <img style="margin: auto; width: 100%; height: 400px; overflow:scroll" src="data:image/png;base64,<?php echo $post['thumb']; ?>" />
                        <!--img src="./imagenes/<?php // echo base64_decode($post['thumb']); ?>" alt="<?php// echo $post['titulo'] ?>"-->
                    </a>
                </div>
                <p class="extracto"><?php echo $post['extracto'];  ?></p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continual Leyendo</a>
            </article>
        </div>
    <?php endforeach;   ?>

</div>



</body>
</html>



---------------------------------------------
POSTS


<?php session_start();

require 'admin/config.php';
require 'functions.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die();
}
//-------------


$conexion = conexion($bd_config);


if (!$conexion) {
    header('Location: error.php');
}
$posts = obtener_post_customer($blog_config['post_por_pagina'], $conexion);

$categorias = obtener_todas_categorias($conexion);


$nombr_usuario = ucfirst($_SESSION['usuario']['name']);


//-----------------------------
$nombr_usuario = ucfirst($_SESSION['usuario']['name']);
//session_destroy();
require 'views/customer_foro.view.php';



-----------------------------------------
Vista


<?php require 'header_costumer.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registrate como cliente</title>
</head>
<body>

<div class="contenedor">
    <div class="post">
        <h1>Portal de Clientes</h1>
        <a href="nuevo.post.php" class="btn">Nuevo Post</a>
    </div>
</div>

<div class="contenedor">
    <?php foreach ($posts as $post):?>
        <div class="post">
            <article style="margin: auto">
                <h2 class="titulo"><a href="single.costumer.php?id=<?php echo $post['id']; ?>"><?php echo $post['post_name'];  ?></a></h2>
                <hr/>
                <p class="fecha" style="margin-top:10px;"><em>Publicado: &#160; &#160;</em><?php echo fecha($post['fecha']);  ?></p>
                <p class="fecha" >Posteado por: <?php  echo obtener_nombre_usuario($post['id_user']);?></p>
                <p class="fecha" >Categoría: <?php  echo obtener_categoria($post['id_categoria']);?></p>
                <p class="extracto"><?php echo $post['texto'];  ?></p>
                <a href="single.costumer.php?id=<?php echo $post['id']; ?>" class="continuar">Continual Leyendo</a>
            </article>
        </div>
    <?php endforeach;   ?>

</div>


</body>
</html>