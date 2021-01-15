<?php require 'views/header_costumer.php'?>

<div class="contenedor">
    <h2>Panel de Control</h2>
    <a href="nuevo.post.php" class="btn">Nuevo Post</a>
    <?php foreach ($posts as $post):?>
        <div class="post">
            <article>
                <h2 class="titulo"><?PHP echo $post['post_name']; ?></h2>
                <a href="editar_post.php?id=<?php echo $post['id']; ?>">Editar</a>
                <a href="single.costumer.php?id=<?php echo $post['id']; ?>">Ver</a>
                <a onclick="cancelrequest(<?php echo $post['id']; ?>)" class="BotonAccion">Borrar</a>

            </article>
            <script language="JavaScript" >
                function cancelrequest(soli_id) {
                    if (confirm("¿Eliminaras este Servicio? Recuerda que se eliminará para siempre.")){
                        window.location.href='borrar_post.php?id=' + soli_id+'';
                        return true;
                    }
                }
            </script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        </div>
    <?php endforeach;   ?>
