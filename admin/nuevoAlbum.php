<?php
include './core/Main.php';
$session = new Session_model();
if (!$session->seguridad("id_usuario")) {
    header("location:index.php");
}

$id_usuario = $_SESSION["id_usuario"];

$file = new File_model();
$album = new Album_model();
$mng = "";



if ($_POST) {
    extract($_POST);
    $fichero = $_FILES["caratula"];

    if ($fichero["name"] != "") {
        $directorio = "../vista/site_media/img/caratulas/";
        $allowedExts = array("jpg", "jpeg", "png", "gif");
        $alowedTypes = array("image/pjpeg", "image/jpeg", "image/png", "image/gif");
        $maxSize = 2062144;

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
                $caratula = $result;
                $album->insertAlbum($nombre, $caratula, $fecha);
                $nombre = "";
                $fecha = "";
        }
    } else {
        $caratula = "";
        $album->insertAlbum($nombre, $caratula, $fecha);
        $nombre = "";
        $fecha = "";
    }
    if ($result == 0) {
        header("location:listar.php");
    }
}
?>
<?php include './col/header.php'; ?>

<section>
    <h1>Nuevo Album</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre del Album">
        <input type="file" name="caratula" placeholder="Caratula del album">
        <input type="date" name="fecha" placeholder="fecha">
        <input type="submit" value="Subir Album">
    </form>
    <span><?= $mng ?></span>

</section>


<?php include './col/footer.php'; ?>
