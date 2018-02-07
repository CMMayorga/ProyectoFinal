<?php
include './core/Main.php';
$login = new User_model();

$mng = "";

if ($_POST) {
    extract($_REQUEST);
    if ($login->recuperarPass($email)) {
        $mng = "Se ha enviado la info nueva al email";
    } else {
        $mng = "Usuario no existe";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="site_media/css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body class="login">

        <div id="login">
            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">

                <h1>Recuperar</h1>
                <input type="email" name="email" placeholder="user@email.com" required autofocus>
                <input type="submit" value="Entrar">

                <a href="index.php">Volver al Login</a>

            </form>

        </div>

        <span><?= $mng ?></span>

    </body>
</html>
