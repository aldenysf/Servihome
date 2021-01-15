<?php
if(($_SESSION['usuario']["type_user"]) == "M" ){
    require 'header.php';
}else{
    require 'header_costumer.php';
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">

    <title>Edita tus datos de contacto</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="jquery-3.2.1.min.js"></script>
<script src="alertifyjs/alertify.js"></script>
</body>

<div class="contenedor">
    <div class="post">
        <form class="formulario" method="POST" name="register_costumer" id="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div id="encabezado"><h1>Edita tus datos de contacto</h1> </div>

                <div class="card" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;" >
                    <img class="card-img-top" src="<?php if( $usuario['type_user'] == "M" )
                    { echo "imagenes/worker.png";}
                    else{ echo "imagenes/buyer.png";}?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Nombre: <?php echo obtener_nombre_usuario($usuario['id']); ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Telefono: <?php echo $usuario['telefono']; ?></li>
                        <li class="list-group-item">Correo Electronico: <?php echo $usuario['mail'];?></li>
                        <li class="list-group-item">Tipo de usuario: <?php if($usuario['type_user'] == "M" ){echo "Trabajador";
                            }else{echo "Cliente";} ?></li>
                    </ul>
                </div>
            <input hidden type="text" placeholder="Nombre" name="id" value="<?php echo $usuario['id']; ?>"><br>
            <input  type="text" placeholder="Nombre" name="nombre" maxlength="20" value="<?php echo ucfirst($usuario['name']); ?>"><br>
            <input  type="text" placeholder="Apellido Materno" name="apellido1" maxlength="20" value="<?php echo ucfirst($usuario['lastname_1']); ?>"><br>
            <input  type="text" placeholder="Apellido Paterno" name="apellido2" maxlength="20" value="<?php echo ucfirst($usuario['lastname_2']); ?>"><br>
            <input  type="number" placeholder="Telefono" name="telefono" maxlength="12" value="<?php echo $usuario['telefono']; ?>"><br>
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

            <input onclick="submitform()" type="submit" class="BotonAccion"
                   name="submit" value="Guardar">
        </form>
        <! –– <button id="ejecuta"><!-- Ejecutar mensaje--> </button>
    </div>

</div>




</html>