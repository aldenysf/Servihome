<?php require 'views/header_costumer.php'?>

<div class="contenedor">
    <div class="post">
        <article>

            <h2 class="titulo">Nuevo Post</h2>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="nombrePost" placeholder="Titulo del Post">
                <select name="Categoria">
                    <?php foreach ($categorias as $catego): ?>
                        <option  value="<?php echo $catego['id']?>"> <?php echo $catego['categoria']?></option>
                    <?php endforeach;   ?>
                </select><br>
                <textarea name="texto" placeholder="¿Que problema presentas?"></textarea>
                <?php if(!empty($errores)) :?>
                    <div class="error">
                        <?php echo $errores;?>
                    </div>
                <?php endif; ?>
                <input type="submit" value="Crear Articulo">
            </form>
        </article>
    </div>
</div>