<?php

/*
 * Fecha creación: 26 Mayo 2015
 * Fecha de última actualización: 30 Junio 2015
 * Versión: 1.0
 * Autor: Carlos Martín
 * Aplicación: CMS Gestor de musica
 * Empresa: CICE
 */

include 'core/Db_model.php';
include 'core/Album_model.php';
include 'core/File_model.php';
include 'core/Session_model.php';
include 'core/User_model.php';
include 'core/Canciones_model.php';

include 'model/Cancion.php';
include 'model/Album.php';
include 'model/Usuario.php';

class Main {

    protected $db;

    function __construct() {
        include 'inc/conexion.php';
        $this->db = new Db_model($host, $user, $password, $database);
    }

}
