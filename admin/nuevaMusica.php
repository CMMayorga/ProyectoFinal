<?php
include './core/Main.php';
$session = new Session_model();
if (!$session->seguridad("id_usuario")) {
    header("location:index.php");
}

$id_usuario = $_SESSION["id_usuario"];

$id_album = $_GET["id"];

$file = new File_model();
$album = new Album_model();
$cancion = new Canciones_model();
$nombreAlbum = $album->selectNombre($id_album);
$mng = "";

$arrayAlbum = $album->selectAlbum($id_album);
$arrayObjCancion = $cancion->selectCanciones($id_album);

if (isset($_GET["e"])) {

    $cancion->deleteCancion($_GET["e"]);
    header("location:nuevaMusica.php?id=$id_album");
}

if ($_POST) {
    extract($_POST);
    $fichero = $_FILES["ruta"];

    if ($fichero["name"] != "") {
        $directorio = "../vista/site_media/music/";
        $allowedExts = array("mp3");
        $alowedTypes = array("audio/mpeg", "audio/x-mpeg", "audio/mp3", "audio/x-mp3", "audio/mpeg3", "audio/x-mpeg3", "audio/mpg", "audio/x-mpg", "audio/x-mpegaudio");
        $maxSize = 9999999999999;

        $result = $file->subirFicheroRename($fichero, $allowedExts, $alowedTypes, $maxSize, $directorio);

        switch ($result) {
            case '0':
                $mng = "extensión incorrecta";
                break;
            case '1':
                $mng = "tamaño max excedido";
                break;
            case '2':
                $mng = "error en el fichero";
                break;
            case '3':
                $mng = "error en la subida";
                break;
            default:
                $ruta = $result;
                $cancion->insertCancion($titulo, $autor, $ruta, $id_album);
                $titulo = "";
                $autor = "";
                $id_album = "";
        }
    } else {
        $ruta = "";
        $cancion->insertCancion($titulo, $autor, $ruta, $id_album);
        $titulo = "";
        $autor = "";
        $id_album = "";
    }
}
?>
<?php include './col/header.php'; ?>

<section>
    <h1><?= $nombreAlbum ?></h1>
    <br>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">  
        <input type="text" name="titulo" placeholder="Titulo">
        <input type="text" name="autor" placeholder="Autor">
        <input type="file" name="ruta" placeholder="Cancion">
        <input type="submit" value="Guardar">    
    </form>

    <span><?= $mng ?></span>

</section>

<table>
    <?php if (count($arrayObjCancion) > 0) { ?>
        <?php foreach ($arrayObjCancion as $objCancion) { ?>
            <tr>
                <td><?= $objCancion->getTitulo() ?></td>
                <td><?= $objCancion->getAutor() ?></td>

                <td><a href="nuevaMusica.php?e=<?= $objCancion->getId() ?>"> &#215;</a></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="4">No hay canciones en este album</td>
        </tr>
    <?php } ?>
</table>

<?php include './col/footer.php'; ?>