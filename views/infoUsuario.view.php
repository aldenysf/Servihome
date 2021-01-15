<?php
if(($_SESSION['usuario']["type_user"]) == "M" ){
    require 'header.php';
}else{
    require 'header_costumer.php';
}?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo RUTA; ?>css/estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="contenedor">
    <div class="post">
        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <div id="encabe" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;"><h1>Datos de Contacto</h1></div>
            <?php ?>
            <div class="card" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;" >
                <img class="card-img-top" src="<?php if( $usuario['type_user'] == "M" )
                { echo "imagenes/worker.png";}
                else{ echo "imagenes/buyer.png";}?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre: <?php echo obtener_nombre_usuario($usuario['id']); ?></h5>
                    <p class="card-text">Puedes contactar a <?php echo ucfirst($usuario['name']) ?> y hacer alguna modificación o cancelación del servicio poniendote de acuerdo con el/ella. </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Telefono: <?php echo $usuario['telefono']; ?></li>
                    <li class="list-group-item">Correo Electronico: <?php echo $usuario['mail'];?></li>
                    <li class="list-group-item">Tipo de usuario: <?php if($usuario['type_user'] == "M" ){echo "Trabajador";
                    }else{echo "Cliente";} ?></li>


                </ul>
            </div>
        </form>
    </div>
</div>
