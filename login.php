<?php
session_start();
//session_destroy();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die();
}


$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = filter_var(strtolower($_POST['correo']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $type_user ="C";
   // $password = hash('sha512', $password);

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=proyecto2', 'root', '');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $statement = $conexion->prepare('SELECT * FROM user_master WHERE mail = :correo AND password = :password AND type_user = :type_user');
    $statement->bindParam(':correo', $correo);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':type_user', $type_user);
    $statement->execute();
    $resultado = $statement->fetch();
    $usuario = $resultado;

    if ($resultado !== false) {
        $_SESSION['usuario'] = $resultado;
        //print_r($_SESSION['usuario']['name']);
        header('Location: index.php');
    } else {
        $errores .= '<li>Datos ingresados incorrectos</li>';
    }
}

require 'views/login.view.php';