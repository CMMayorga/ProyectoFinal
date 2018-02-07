<?php

class User_model extends Main {

    //Login
    public function comprobarUser($email, $password) {
        $pass_code = sha1($password);
        $arrayArrays = $this->db->executeSelectQuery("SELECT * FROM usuarios WHERE email='$email' AND password='$pass_code' ");

        if (count($arrayArrays) > 0) {
            foreach ($arrayArrays as $fila) {
                return new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['password']);
            }
        } else {
            return false;
        }
    }

    public function registrarUser($nombre, $email, $password) {
        $arrayArrays = $this->db->executeSelectQuery("SELECT * FROM usuarios WHERE email='$email' OR nombre='$nombre' ");

        if (count($arrayArrays) > 0) {
            return false;
        } else {
            $pass_code = sha1($password);
            if ($this->db->executeQuery("INSERT INTO usuarios (nombre,email,password) VALUES ('$nombre','$email','$pass_code')")) {
                $asunto = "Nuevo usuario";
                $mensaje = "Gracias por registrarte en nuestra web, estos son tus datos de acceso: $email y $password";
                $this->enviarEmail($nombre, $email, $asunto, $mensaje);
                return true;
            } else {
                return false;
            }
        }
    }

    public function recuperarPass($email) {
        $arrayArray = $this->db->executeSelectQuery("SELECT * FROM usuarios WHERE email='$email'");

        if (count($arrayArray) > 0) {

            foreach ($arrayArray as $fila) {
                $nombre = $fila['nombre'];
            }

            $pass = $this->generarPass();
            $pass_code = sha1($pass);

            if ($this->db->executeQuery("UPDATE usuarios SET password='$pass_code' WHERE email='$email' ")) {
                $asunto = "Recuperación";
                $mensaje = "Estos son tus nuevos datos: $email y $pass";
                $this->enviarEmail($nombre, $email, $asunto, $mensaje);
                return true;
            }
        } else {
            return false;
        }
    }

    private function generarPass() {
        $cadena = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?=$";
        $longitudCadena = strlen($cadena);
        $pass = "";
        for ($i = 0; $i < 8; $i++) {
            $pos = rand(0, $longitudCadena - 1);
            $pass .= substr($cadena, $pos, 1);
        }
        return $pass;
    }

    private function enviarEmail($nombre, $email, $asunto, $mensaje) {
        $header = "To: $nombre <$email>";
        $header .= "From: Admin <hola@noresponder.com>";
        mail($email, $asunto, $mensaje, $header);
    }

    //Perfil
    public function datosUser($id) {
        $arrayArray = $this->db->executeSelectQuery("SELECT * FROM usuarios WHERE id=$id");
        foreach ($arrayArray as $fila) {
            extract($fila);
            return new Usuario($id, $nombre, $email, $password);
        }
    }

    public function updateDatosUser($id, $nombre, $email, $password) {
        $arrayArrays = $this->db->executeSelectQuery("SELECT * FROM usuarios WHERE email='$email' OR nombre='$nombre' AND id!=$id ");

        if (count($arrayArrays) > 0) {
            return false;
        } else {
            if ($password == "") {
                return$this->db->executeQuery("UPDATE usuarios SET nombre='$nombre', email='$email' WHERE id=$id");
            } else {
                $pass_code = sha1($password);
                return$this->db->executeQuery("UPDATE usuarios SET nombre='$nombre', email='$email', password='$pass_code' WHERE id=$id");
            }
        }
    }

}
