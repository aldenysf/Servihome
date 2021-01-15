<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Servi Home Login</title>
</head>
<header class="fixed">
    <div class="contenedor">
        <div class="logo izquierda">
            <p><a>Servi Home</a></p>
        </div>
        <div class="derecha">
        </div>
    </div>
</header>

<body>

<div class="contenedor">
    <div class="post">
        <h3 style="text-align: center;">Selecciona como deseas ingresar</h3>
        <div class="d-flex justify-content-center" role="group" aria-label="Third group">

        </div>
        <div class="d-flex justify-content-center" role="group" aria-label="Third group">
            <button type="button" class="btn btn-danger"><a style=" color: white" href="login_master.php" ">Trabajador</a></button>
            <div style="color: white;"><p> ----------------- </p></div>
            <button type="button"class="btn btn-danger"> <a style=" color: white" href="login.php">Cliente</a></button>

        </div>
    </div>
    <style> .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }</style>

</div>
<div class="contenedor">
    <div class="post">
        <p style="font-family:'Oswald', sans-serif; font-size:120%; ">Bienvenido a Servi Home! Tu sitio web que te permitirá solicitar
            y prestar exclusivamente servicios de una manera gratuita,
            segura y rapida  <i class="fa fa-money fa-2x" aria-hidden="true"></i> .
            <br>
            Podrás registrarte de manera gratuita para solo comenzar a utilizar Servi Home.
            Solo debes seleccionar si deseas utilizar Servi Home siendo un trabajador o un cliente .
        </p>

            <img class="center" src="<?php echo "imagenes/promotion.png";?>" alt="Card image cap" style="width:500px;height:600px;" >

        </div>
    </div>
</div>

</body></html>