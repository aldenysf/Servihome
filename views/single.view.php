<?php
if(($_SESSION['usuario']["type_user"]) == "M" ){
    require 'header.php';
}else{
require 'header_costumer.php';
}?>


<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><?php echo $post['titulo']; ?></h2>
            <p class="fecha"><?php echo fecha($post['fecha'])?></p>
            <p class="fecha" >Posteado por: <?php  echo obtener_nombre_usuario($post['user_id']);?></p>
            <p class="fecha" >Costo: <?php  echo $post['precio']. ' CLP por '. obtener_tipo_de_cobro_por_id($post['id_tipo_cobro']);?></p>
            <p class="fecha" >Categoría: <?php  echo obtener_categoria($post['id_categoria']); ?></p>
            <div class="thumb">

                <img  src="data:image/png;base64,<?php echo $post['thumb']; ?>" />
            </div>
            <p class="texto"><?php echo nl2br($post['texto']); ?></p>
        </article>

        <?php if(($_SESSION['usuario']["type_user"]) == "M") :?>
            <a href="master_user.php" class="btn">Volver</a>
        <?php else:?>
            <a href="customer_foro.php" class="btn">Volver</a>
        <?php endif; ?>

    </div>
</div>
<div class="contenedor" <?php if(($_SESSION['usuario']["type_user"]) == "M" ){ echo "hidden";} ?> >
    <div class="post">
        <form class="formulario" method="POST"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
            <input  hidden name="id_servicio"  value="<?php echo $_GET['id'];?>">
            <input  hidden name="titulo2"  value="<?php echo $post['titulo'];?>">
            <input  hidden name="precio2"  value="<?php echo $post['precio'];?>">
            <input  hidden name="user_id2"  value="<?php echo $post['user_id'];?>">
            <input hidden name="correo" value="<?php echo  $datos_user['mail'];?>">
            <input hidden name="telefono" value="<?php echo  $datos_user['telefono'];?>">
            <div id="encabezado"><h1>Haz alguna propuesta y solicita ser contactado.</h1></div>

            <label for="appt">Dirección</label><br>
            <input class="" type="text" placeholder="Dirección" name="direccion"><br>
            <label for="appt">Fecha para recibir el servicio:</label>
            <input type="date" id="start" name="fecha2" value="<?php echo date("Y/m/d");  ?>"

                   min="<?php echo date("Y/m/d");?>" max="2028-12-31"><br>
            <label for="appt">Horario para recibir el servicio:</label>
            <input type="time" id="appt" name="hora">
            <textarea name="texto" placeholder="Descripción del problema"></textarea>
            <p class="asegurate ">Asegura que los datos estén correctos y completos...</p>
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