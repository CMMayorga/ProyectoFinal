<?php
include './core/Main.php';
$session = new Session_model();
if (!$session->seguridad("id_usuario")) {
    header("location:index.php");
}

$file = new File_model();
$album = new Album_model();
$cancion = new Canciones_model();

$arrayObjAlbum = $album->selectAlbumes();

$user = new User_model();
?>
<?php include './col/header.php'; ?>

<?php
if (isset($_GET["e"])) {
    $album->deleteAlbum($_GET["e"]);
    $cancion->deleteCancionporAlbum($_GET["e"]);
    header("location:listar.php");
}
?>

<section>
    <h1>Albumes</h1>
    <table cellspacing="0">

        <tr>
            <th>
                <span>Nombre</span>
            </th>
            <th>
                <span>Fecha de lanzamiento</span>
            </th>
            <th></th>
            <th></th>
        </tr>

<?php if (count($arrayObjAlbum) > 0) { ?>
    <?php foreach ($arrayObjAlbum as $objAlbum) { ?>
                <tr>
                    <td><?= $objAlbum->getNombre() ?></td>
                    <td><?= $objAlbum->getFecha() ?></td>

                    <td><a href="nuevaMusica.php?id=<?= $objAlbum->getId() ?>" class="ins">Insertar cancion</a></td>
                    <td><a href="listar.php?e=<?= $objAlbum->getId() ?>"> &#215;</a></td>
                </tr>
    <?php } ?>
<?php } else { ?>
            <tr>
                <td colspan="4">No hay albumes</td>
            </tr>
<?php } ?>

    </table>

    <span></span>

</section>

<?php include './col/footer.php'; ?>
