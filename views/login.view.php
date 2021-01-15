
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Inicio de Sesión cliente</title>
</head>
<header class="fixed">
    <div class="contenedor">
        <div class="logo izquierda">
            <p><a href="index.php">Servi Home</a></p>
        </div>

    </div>
</header>

<body>

<div class="contenedor">
    <div class="post">
        <form class="formulario" method="POST" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"<>

        <h1> <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i> Inicia Sesión como Cliente</h1>
            <input class="" type="email" placeholder="Correo" name="correo"><br>
            <input class="" type="password" placeholder="Contraseña" name="password"><br>
            <input class="" type="submit" name="submit" value="Ingresar">
        </form><h3>Para ingresar como un trabajador, <a href="login_master.php">pincha aquí</a></h3>
        <h5>¿Aun no estas registrado como cliente? <a href="register_costumer.php">Registrate</a></h5>

        <?php if(!empty($errores)) :?>
            <div class="error">
                <?php echo $errores;?>
            </div>
        <?php endif; ?>
    </div>
    <style>
        h1 {
            text-align: center;
        }

    </style>
</div>
</body>
</html>