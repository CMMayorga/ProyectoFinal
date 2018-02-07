<?php
include './admin/inc/conexion.php';

$conexion = mysqli_connect($host, $user, $password) or die("Error en la conexion");
mysqli_select_db($conexion, $database) or die("Error en la seleccion de la BBDD");

mysqli_set_charset($conexion, "utf8");

$sql = "SELECT id, caratula FROM albumes";
$result = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MONSTERCAT</title>
        <link href="vista/site_media/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="vista/site_media/css/responsive.css" rel="stylesheet" type="text/css"/>
    </head>
    <body id="top">
        <header>
            <h1>monstercat</h1>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="#albumes" class="smooth">ALBUMES</a></li>
                    <li><a href="#sobrenosotros" class="smooth">SOBRE NOSOTROS</a></li>
                    <li><a href="#contacto" class="smooth">CONTACTO</a></li>
                </ul>
            </nav>
        </header>
        <div class="cont">
            <video autoplay="" width="100%" onended="ocultarvideo()" id="video">
                <source src="vista/site_media/video/MC_CLIP_Text.f4v" type="video/mp4">
            </video>
            <div id="welcome">
                <h1>BIENVENIDOS A LA FAN WEB DE MONSTERCAT</h1>
                <h3>En esta web podreis ver alguno de los trabajos del grupo monstercat!</h3>
            </div>
            <div class="cuad smooth" id="albumes">
                <h1>ALBUMES</h1>
                <?php
                $i = 0;
                while ($fila = mysqli_fetch_array($result)) {
                    extract($fila);
                    ?>
                    <a href="rep.php?id=<?= $id ?>"><img src="vista/site_media/img/caratulas/<?= $caratula ?>"></a>

                <?php } ?>
            </div>
            <div class="about smooth" id="sobrenosotros">
                <h1>SOBRE MONSTERCAT</h1>
                <p>
                    Monstercat (antes conocido como Monstercat Media) es un sello discográfico independiente 2 conocido por su música electrónica. Algunos de los géneros que incluye son EDM
                    (Electronic Dance Music), Dubstep, House, Drum and Bass, Electro, Glitch Hop, entre otros subgéneros de la música electrónica.</p>

                <p>Monstercat comenzó a compilar su primer álbum: "001 - Launch Week", incluyendo artistas como Arion, Feint, Ephixa y otros. 
                    El número de artistas ha crecido desde entonces a casi seis veces más que desde el inicio de la discográfica.</p>
                <p>3 Los álbumes de Monstercat se han convertido en una serie periódica de discos numerados, incluyendo canciones de varios artistas y de géneros electrónicos variados
                    que son adquiribles por separado en muchos mercados, tales como iTunes, Beatport y Bandcamp.</p>
                <iframe width="853" height="480" src="https://www.youtube.com/embed/oRndemAS698?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="form smooth" id="contacto">
                <h1>CONTACTO</h1>
                <form>
                    <input type="text" name="nombre" placeholder="Nombre" >
                    <input type="email" name="email" placeholder="Direccion de correo">
                    <textarea rows="15" name="mensaje" placeholder="Tu mensaje"></textarea>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>

    <div class="top">
        <a href="#top">Arriba</a>
    </div>

    <footer>
        <div class="contfooter">
            <div class="social">
                <a href="https://www.youtube.com/user/MonstercatMedia"><span class="icon-youtube"></span></a>
                <a href="https://soundcloud.com/Monstercat"><span class="icon-soundcloud"></span></a>
                <a href="https://www.facebook.com/monstercat"><span class="icon-facebook"></span></a>
                <a href="https://twitter.com/monstercat"><span class="icon-twitter"></span></a>
                <a href="https://play.spotify.com/user/monstercatmedia"><span class="icon-spotify"></span></a>
            </div>
            <div class="links">
                <ul>
                    <li><a href="admin/index.php">ADMIN</a></li>
                    <li><a href="https://www.monstercat.com/">Página oficial Monstercat</a></li>
                </ul>
            </div>
        </div>
        <div class="legal">
            Carlos Martín Mayorga - MDI - CICE - 2015  |  Todos los derechos reservados a Montercat y sus filiales.
        </div>
    </footer>

    <script src="vista/site_media/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="vista/site_media/js/video.js" type="text/javascript"></script>
    <script src="vista/site_media/js/scroll.js" type="text/javascript"></script>
</body>

</html>
