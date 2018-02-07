<?php

include './core/Main.php';
$session = new Session_model();

if ($session->cerrarSesion()) {
    header("location:index.php");
}