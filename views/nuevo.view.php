<?php require 'views/header.php'?>


<script src=https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js" ></script>
<script> $(document).ready(function){
    $("form").submit(function (event) {
    event.preventDefault();
    var titulo = $("#id-titulo").val();
        var categoria = $("#id-categoria").val();
        var extracto = $("#id-extracto").val();
        var precio = $("#id-precio").val();
        var cobro = $("#id-cobro").val();
        var texto = $("#id-texto").val();
        $("form-message").load("nuevo.php",{
           titulo:  titulo,
            categoria:  categoria,
            extracto:  extracto,
            precio:  precio,
            cobro:  cobro,
            texto:  texto
        });
    });
});</script>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Nuevo Servicio</h2>
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input id="id-titulo" type="text" name="titulo" placeholder="Titulo del Articulo">
                <select id="id-categoria" name="Categoria">
                    <?php foreach ($categorias as $catego): ?>
                        <option  value="<?php echo $catego['id']?>"> <?php echo $catego['categoria']?></option>
                    <?php endforeach;   ?>
                </select><br>
                <input type="text" id="id-extracto" name="extracto" placeholder="Descripción breve">
                <label for="quantity">Precio del Servicio</label>
                <input type="number" id="id-precio" name="precio" min="1" max="999999999" placeholder="Precio" >
                <label for="quantity"> CLP por: </label>
                <select id="id-cobro" name="cobro">
                    <?php foreach ($tipo_cobro as $cobro): ?>
                        <option  value="<?php echo $cobro['id']?>"> <?php echo $cobro['cobro']?></option>
                    <?php endforeach;   ?>
                </select><br>

                    <textarea id="id-texto" name="texto" placeholder="Descripción detallada del articulo"></textarea>
                <input type="file" name="thumb">
                <?php if(!empty($errores)) :?>
                    <div class="error">
                        <?php echo $errores;?>
                    </div>
                <?php endif; ?>
                <p id="form-message"></p>
                <input type="submit" value="Agregar">


            </form>
        </article>
    </div>
</div>