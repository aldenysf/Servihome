<?php session_start();

$exito = '';
$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING);
    $apellido1 = filter_var(strtolower($_POST['apellido1']), FILTER_SANITIZE_STRING);
    $apellido2 = filter_var(strtolower($_POST['apellido2']), FILTER_SANITIZE_STRING);
    $correo = filter_var(strtolower($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $password = trim( $_POST['password1']);
    $password2 = trim( $_POST['password2']);
    $telefono = trim( $_POST['telefono']);

    // $password = hash('sha512', $password);

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=proyecto2', 'root', '');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $statement = $conexion->prepare('SELECT * FROM user_master WHERE mail = :correo LIMIT 1');
    $statement->bindParam(':correo', $correo);
    $statement->execute();
    $resultado = $statement->fetch();



    if ($resultado == true) {
        $errores .= '<li>Ya existe un usuario con este correo.</li>';
    }
    else if ($nombre == "" || $apellido1 == "" || $apellido2 == "" || $correo == "" || $password == "" || $password2 == ""){
    $errores .= '<li>Completa todos los datos.</li>';
}
    else if($password != $password2){
        $errores .= '<li>Las contraseñas no coinciden.</li>';
    }

    if($errores == ''){
        $statement = $conexion->prepare(
            'INSERT INTO user_master
            (id, name, lastname_1, lastname_2, password, mail, telefono, creation_date, type_user) 
            values (:id, :name, :lastname_1, :lastname_2, :password, :mail,:telefono, :creation_date, :tipo)');
        $statement->execute(
            array(':id' =>null,
                ':name' =>$nombre,
                ':lastname_1' => $apellido1,
                ':lastname_2' => $apellido2,
                ':password' =>$password,
                ':mail' => $correo,
            ':telefono' =>$telefono,
                ':creation_date' =>null,
                ':tipo'=>'M'));


        $exito .= '<li>Usuario Registrado exitosamente</li>';
        header('Location: login_master.php');
    }
}
require 'views/register_master.view.php';
