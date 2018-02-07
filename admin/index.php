<?php
include './core/Main.php';
$session = new Session_model();
$login = new User_model();

$mng = "";

if ($session->seguridad("id_usuario")) {
    header("location:listar.php");
} else {

    if ($_POST) {
        extract($_REQUEST);
        if ($usuario = $login->comprobarUser($email, $password)) {
            $_SESSION["id_usuario"] = $usuario->getId();
            header("location:listar.php");
        } else {
            $mng = "No existe usuario";
        }
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

                <h1>Login</h1>

                <input type="email" name="email" placeholder="user@email.com" required autofocus>
                <input type="password" name="password" placeholder="****" required>
                <input type="submit" value="Entrar">

                <a href="registrar.php">Nuevo Usuario</a>
                <a href="recuperar.php">Recuperación de contraseña</a>

            </form>

            <span><?= $mng ?></span>
        </div>


    </body>
</html>
