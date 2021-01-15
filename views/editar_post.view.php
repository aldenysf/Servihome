<?php require 'header_costumer.php'; ?>
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Editar Post</h2>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" value="<?php echo $post['id']; ?>" name="id">
                <input type="text" name="titulo" value="<?php echo $post['post_name']; ?>">
                <select name="categoria">
                    <?php foreach ($categorias as $catego): ?>
                        <option  value="<?php echo $catego['id']?>"> <?php echo $catego['categoria']?></option>
                    <?php endforeach;   ?>
                    <textarea name="texto"><?php echo $post['texto']; ?></textarea>
                    <?php if(!empty($errores)) :?>
                        <div class="error">
                            <?php echo $errores;?>
                        </div>
                    <?php endif; ?>
                    <input type="submit" value="Guardar Cambios">
            </form>

        </article>
    </div>
</div>