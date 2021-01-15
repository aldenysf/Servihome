<?php require 'header.php'; ?>

<div class="contenedor">
    <div class="post">
        <form class="formulario" method="POST"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
            <div id="encabezado"><h1>Edita la solicitud</h1></div>

            <label for="appt">Titulo</label><br>
            <input class="" type="text"  name="titulo" value="<?php echo $post['titulo'];?>" disabled><br>
            <label for="appt">Cliente:</label><br>
            <input class="" type="text" name="nombre_cliente" value="<?php echo obtener_nombre_usuario($post['id_costumer']);?>" disabled><br>
            <label for="appt">Dirección:</label><br>
            <input class="" type="text" placeholder="Sin dirección" name="direccion" value="<?php echo $post['direccion'];?>" disabled><br>
            <label for="appt">La fecha del la solicitud actual es <?php echo fecha_con_hora($post['fecha']);?></label><br>
            <label for="appt">Actualiza la fecha:</label>
            <input type="date" id="start" name="fecha2" value="<?php echo date("Y/m/d");  ?>"
                   min="<?php echo date("Y/m/d");?>" max="2028-12-31"><br>
            <label for="appt">Actualiza la hora:</label>
            <input type="time" id="appt" name="hora2">
            <input hidden   name="id" value="<?php echo $post['id'];?>">
            <textarea name="texto" placeholder="Descripción del problema" disabled><?php echo $post['texto'];?></textarea>
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