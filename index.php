<?php session_start();
//session_destroy();

if(isset($_SESSION['usuario'])){

    if ($_SESSION['usuario']['type_user'] == 'C'){
  header('Location: customer_foro.php');
    }
    else{
        header('Location: master_foro.php');}
    }

  //  header('Location: login.php');
//else{  header('Location: index.php');}

require 'views/index.view.php';


