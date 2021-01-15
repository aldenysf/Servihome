<?php require 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registrate como Trabajador</title>
</head>
<body>

<div class="contenedor">
    <div class="post">
        <h1>Portal de Trabajador</h1>
        <a href="nuevo.php" class="btn">Nuevo Servicio</a>
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
<?php require'paginacion.post.php'?>

</body>
</html>