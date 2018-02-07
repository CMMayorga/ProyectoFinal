<?php

class Canciones_model extends Main {

    public function insertCancion($titulo, $autor, $ruta, $id_album) {
        return $this->db->executeQuery("INSERT INTO canciones (titulo,autor,ruta,id_album) VALUES ('$titulo','$autor','$ruta','$id_album')");
    }

    public function deleteCancion($id) {
        $directorio = "../vista/site_media/music/";
        $cancion = $this->selectCancion($id);
        $file = new File_model();
        $file->deleteCancion($directorio . $cancion);
        return $this->db->executeQuery("DELETE FROM canciones WHERE id=$id");
    }

    public function deleteCancionporAlbum($id_album) {
        $directorio = "../vista/site_media/music/";
        $cancion = $this->selectCancionporAlbum($id_album);
        $file = new File_model();
        $file->deleteCancion($directorio . $cancion);
        return $this->db->executeQuery("DELETE FROM canciones WHERE id=$id_album");
    }

    private function selectCancion($id) {
        $arrayArray = $this->db->executeSelectQuery("SELECT ruta FROM canciones WHERE id=$id");
        $nombreCancion = "";
        foreach ($arrayArray as $fila) {
            $nombreCancion = $fila["ruta"];
        }
        return $nombreCancion;
    }

    private function selectCancionporAlbum($id_album) {
        $arrayArray = $this->db->executeSelectQuery("SELECT ruta FROM canciones WHERE id_album=$id_album");
        $nombreCancion = "";
        foreach ($arrayArray as $fila) {
            $nombreCancion = $fila["ruta"];
        }
        return $nombreCancion;
    }

    public function selectCanciones($id_album) {
        $arrayArrays = $this->db->executeSelectQuery("SELECT id, titulo, autor, ruta, id_album FROM canciones WHERE id_album=$id_album ORDER BY titulo DESC");
        $arrayObj = array();
        foreach ($arrayArrays as $fila) {
            extract($fila);
            $cancion = new Cancion($id, $titulo, $autor, $ruta, $id_album);
            $arrayObj [] = $cancion;
        }
        return $arrayObj;
    }

}
