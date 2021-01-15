
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registrate como cliente</title>
</head>
<header class="fixed">
    <div class="contenedor">
        <div class="logo izquierda">
            <p><a href="login.php">Servi Home</a></p>
        </div>
    </div>
</header>

<body>

<div class="contenedor">
    <div class="post">
        <form class="formulario" method="POST" name="register_costumer" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"<>
        <div id="encabezado"><h1> Registrate como cliente</h1> <a href="login.php" class="btn">Volver</a>   </div>
        <input class="" type="text" placeholder="Nombre" name="nombre"><br>
        <input class="" type="text" placeholder="Apellido Materno" name="apellido1"><br>
        <input class="" type="text" placeholder="Apellido Paterno" name="apellido2"><br>
        <input class="" type="email" placeholder="Correo" name="correo"><br>
        <input class="" type="number" placeholder="Telefono" min="1" max="5" name="telefono"><br>
        <input class="" type="password" placeholder="Contraseña" name="password1"><br>
        <input class="" type="password" placeholder="Repita contraseña" name="password2"><br>
        <p class="asegurate " >Asegura que los datos estén correctos...</p>
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
        <input class="" type="submit" name="submit" value="Guardar">
        </form>

    </div>

</div>
</body>
</html>