<?php

$nombr_usuario = ucfirst($_SESSION['usuario']['name']);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Serv Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/estilos.css">
</head>
<body>
<header class="fixed">
    <div class="contenedor">
        <div class="logo izquierda">
            <p><a href="<?php echo RUTA;?>">Servi Home</a></p>
        </div>
        <div class="derecha">


            <nav class="menu">
                <ul>
                    <li><a href="serviciosActuales.php" >Servicios Actuales</a></li>
                    <li><a href="master_solicitud.php" >Solicitudes</a></li>
                    <li><a href="master_user.php" >Tus Servicios</a></li>
                    <li><a href="edit_personal_info.php?id=<?php echo $_SESSION['usuario']['id'];?>"><?php echo $nombr_usuario;?></a></li>
                    <li><a href="cerrar.php" >Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

