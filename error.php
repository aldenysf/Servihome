<?php
session_start();
require 'admin/config.php';
if(($_SESSION['usuario']["type_user"]) == "M" ){
    require 'views\header.php';
}else{
    require 'views\header_costumer.php';
}?>

    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo">Error</h2>
                <br>
            </article>
        </div>
    </div>
