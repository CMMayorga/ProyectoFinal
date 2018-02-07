<?php

class Session_model {

    function __construct() {
        session_start();
    }

    public function seguridad($nameSession) {
        if (isset($_SESSION[$nameSession])) {
            return true;
        } else {
            return false;
        }
    }

    public function cerrarSesion() {
        return session_destroy();
    }

}
