<?php
include './core/Main.php';
$login = new User_model();

$mng = "";
if ($_POST) {
    extract($_REQUEST);
    if ($login->registrarUser($nombre, $email, $password)) {
        $mng = "Usuario registrado correctamente";
    } else {
        $mng = "Usuario ya existe o error en el registro";
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

                <h1>Nuevo Usuario</h1>

                <input type="email" name="email" placeholder="user@email.com" required autofocus>
                <input type="text" name="nombre" placeholder="nombre" required autofocus>
                <input type="password" name="password" placeholder="****" required>
                <input type="submit" value="Entrar">

                <a href="index.php">Ya estoy registrado</a>

            </form>

        </div>

        <span><?= $mng ?></span>

    </body>
</html>
