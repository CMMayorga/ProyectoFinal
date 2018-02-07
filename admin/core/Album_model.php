<?php

class Album_model extends Main {

    public function insertAlbum($nombre, $caratula, $fecha) {
        return $this->db->executeQuery("INSERT INTO albumes (nombre,caratula,fecha) VALUES ('$nombre','$caratula','$fecha')");
    }

    public function deleteAlbum($id) {
        $directorio = "../vista/site_media/img/caratulas/";
        $caratula = $this->selectImagen($id);
        $file = new File_model();
        $file->deleteImagen($directorio . $caratula);
        return $this->db->executeQuery("DELETE FROM albumes WHERE id=$id");
    }

    public function selectAlbum($id) {
        $arrayArray = $this->db->executeSelectQuery("SELECT * FROM albumes WHERE id=$id");
        foreach ($arrayArray as $fila) {
            extract($fila);
            return new Album($id, $nombre, $fecha, $caratula);
        }
    }

    private function selectImagen($id) {
        $arrayArray = $this->db->executeSelectQuery("SELECT caratula FROM albumes WHERE id=$id");
        $nombreImagen = "";
        foreach ($arrayArray as $fila) {
            $nombreImagen = $fila["caratula"];
        }
        return $nombreImagen;
    }

    public function selectNombre($id) {
        $arrayArray = $this->db->executeSelectQuery("SELECT nombre FROM albumes WHERE id=$id");
        $nombreAlbum = "";
        foreach ($arrayArray as $fila) {
            $nombreAlbum = $fila["nombre"];
        }
        return $nombreAlbum;
    }

    public function selectAlbumes() {
        $arrayArrays = $this->db->executeSelectQuery("SELECT id, nombre, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechamod, caratula FROM albumes ORDER BY fecha DESC");
        $arrayObj = array();
        foreach ($arrayArrays as $fila) {
            extract($fila);
            $album = new Album($id, $nombre, $fechamod, $caratula);
            $arrayObj [] = $album;
        }
        return $arrayObj;
    }

}
