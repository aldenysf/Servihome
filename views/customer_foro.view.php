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
                <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo'];  ?></a></h2>
                <hr/>
                <p class="fecha" style="margin-top:10px;"><em>Publicado: &#160; &#160;</em><?php echo fecha($post['fecha']);  ?></p>
                <p class="fecha" ><em>Posteado por: &#160; &#160;</em><?php  echo obtener_nombre_usuario($post['user_id']);?></p>
                <p class="fecha" ><em>Categoría: &#160; &#160;</em><?php  echo obtener_categoria($post['id_categoria']);?></p>
                <p class="fecha" ><em>Costo: &#160; &#160;</em><?php  echo $post['precio']. ' CLP por '. obtener_tipo_de_cobro_por_id($post['id_tipo_cobro']);?></p>
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


<?php require'paginacion.php'?>

</body>
</html>
