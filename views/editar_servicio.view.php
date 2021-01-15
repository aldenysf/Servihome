<?php require 'header.php'; ?>
<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Editar Servicio</h2>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" value="<?php echo $post['id']; ?>" name="id">
                <input type="text" name="titulo" value="<?php echo $post['titulo']; ?>" placeholder="Titulo del Servicio">
                <select name="Categoria">
                    <?php foreach ($categorias as $catego): ?>
                        <option  value="<?php echo $catego['id']?>"> <?php echo $catego['categoria']?></option>
                    <?php endforeach;   ?>
                <input type="text" name="extracto" value="<?php echo $post['extracto']; ?>" placeholder="Descripción breve">
                <label for="quantity">Precio del Servicio</label>
                <input type="number" id="quantity" name="precio" min="1" max="999999999" value="<?php echo $post['precio']; ?>" placeholder="Precio">
                <label for="quantity"> CLP por: </label>
                <select name="cobro">
                    <?php foreach ($tipo_cobro as $cobro): ?>
                        <option  value="<?php echo $cobro['id']?>"> <?php echo $cobro['cobro']?></option>
                    <?php endforeach;   ?>
                </select><br>
                <textarea name="texto" placeholder="Descripción detallada del articulo"><?php echo $post['texto'];?></textarea>
                <input type="file" name="thumb">
                <input type="hidden" name="thumb-guardada" value="value="<?php echo $post['thumb']; ?>"">
                <input type="submit" value="Guardar Cambios">
            </form>

        </article>
    </div>
</div>