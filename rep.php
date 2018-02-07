<?php
include './admin/inc/conexion.php';

if (!isset($_GET["id"])) {
    header("location:index.php");
}

$conexion = mysqli_connect($host, $user, $password) or die("Error en la conexion");
mysqli_select_db($conexion, $database) or die("Error en la seleccion de la BBDD");

$id = $_GET["id"];

mysqli_set_charset($conexion, "utf8");

//canciones
$sql = "SELECT titulo, autor, ruta FROM canciones WHERE id_album=$id";
$result = mysqli_query($conexion, $sql);

//datos album
$sql2 = "SELECT nombre, caratula, fecha FROM albumes WHERE id=$id";
$result2 = mysqli_query($conexion, $sql2);
$fila2 = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="vista/site_media/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="vista/site_media/css/responsive.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <h1>monstercat</h1>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="index.php#albumes">ALBUMES</a></li>
                    <li><a href="index.php#sobrenosotros">SOBRE NOSOTROS</a></li>
                    <li><a href="index.php#contacto">CONTACTO</a></li>
                </ul>
            </nav>
        </header>
        <div class="albinfo">
            <?php
            extract($fila2);
            ?>
            <img src="vista/site_media/img/caratulas/<?= $caratula ?>">
            <h1 class="albname"><?= $nombre ?></h1>
        </div>

        <div class="music">

            <?php
            $i = 0;
            while ($fila = mysqli_fetch_array($result)) {
                extract($fila);
                ?>
                <div class="rep">
                    <h3 class="autor"><?= $autor ?>  -  </h3>
                    <h3 class="titulo"><?= $titulo ?></h3> 

                    <audio src="vista/site_media/music/<?= $ruta ?>" controls="controls"></audio>
                </div>

            <?php } ?>

        </div>
        <script src="vista/site_media/js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="vista/site_media/js/audio.js" type="text/javascript"></script>
    </body>
</html>