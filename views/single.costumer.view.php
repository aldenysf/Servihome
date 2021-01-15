<?php
if(($_SESSION['usuario']["type_user"]) == "M" ){
    require 'header.php';
}else{
    require 'header_costumer.php';
}?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><?php echo $post['post_name']; ?></h2>
            <p class="fecha"><?php echo fecha($post['fecha'])?></p>
            <p class="fecha" >Posteado por: <?php  echo obtener_nombre_usuario($post['id_user']);?></p>
            <p class="texto"><?php echo nl2br($post['texto']); ?></p>
        </article>
    </div>
</div>
<div class="contenedor" <?php if(($_SESSION['usuario']["type_user"]) == "C" ){ echo "hidden";} ?> >
    <div class="post">
        <div id="encabezado"><h1>Haz alguna propuesta.</h1></div>
        <form class="formulario" method="POST"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
            <h3>Selecciona uno de tus servicios:</h3>
            <select name="id_servicio">
                    <?php foreach ($servicios as $servicio): ?>
                        <option  value="<?php echo $servicio['id']?>"> <?php echo $servicio['titulo']?></option>
                    <?php endforeach;   ?>
                </select><br>
            </select>
            <input  hidden name="titulo2"  value="<?php echo $post['titulo'];?>">
            <input  hidden name="id_costumer"  value="<?php echo $post['id_user'];?>">
            <input  hidden name="texto2"  value="<?php echo nl2br($post['texto']);?>">
            <label for="appt">Fecha para entregar el servicio:</label>
            <input type="date" id="start" name="fecha2" value="<?php echo date("Y/m/d");  ?>"
                   min="<?php echo date("Y/m/d");?>" max="2028-12-31"><br>
            <label for="appt">Horario para entregar el servicio:</label>
            <input type="time" id="appt" name="hora">
            <p class="asegurate ">Asegura que los datos estén correctos...</p>
            <?php if(!empty($errores)) :?>
                <div class="error">
                    <?php echo $errores;?>
                </div>
            <?php endif; ?>
            <?php if(!empty($exito)) :?>
                <div class="exito">
                    <?php echo $exito;?>
                </div>
            <?php endif; ?>
            <input class="" type="submit"  value="Guardar">
        </form>
    </div>
</div>