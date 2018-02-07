<?php
$user = new User_model();
$objUsuario = $user->datosUser($_SESSION["id_usuario"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="site_media/css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body class="cms">

        <header>
            <h1>MONSTERC<span>ADMIN</span></h1>
            <nav>
                <ul>
                    <li class="saludo">Hola <?= $objUsuario->getNombre() ?></li>
                    <li><a href="listar.php">Lista albumes</a></li>
                    <li><a href="nuevoAlbum.php">Nuevo Album</a></li>
                    <li><a href="salir.php">Salir</a></li>              
                </ul>
            </nav>
        </header>