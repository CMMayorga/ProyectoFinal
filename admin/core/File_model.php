<?php

class File_model {

    public function subirFicheroRename($fichero, $allowedExts, $allowedTypes, $maxSize, $directorio) {

        $nombre = mb_convert_encoding($fichero["name"], "UTF-8", "ISO-8859-1");
        $size = $fichero["size"];
        $type = $fichero["type"];
        $error = $fichero["error"];
        $tmp_name = $fichero["tmp_name"];

        $arrayName = explode(".", $nombre);
        $ext = strtolower(end($arrayName));

        if (in_array($ext, $allowedExts) && in_array($type, $allowedTypes)) {
            if ($size <= $maxSize) {
                if ($error == 0) {

                    if (move_uploaded_file($tmp_name, $directorio . time() . "_" . $nombre)) {
                        return time() . "_" . $nombre;
                    } else {
                        return '3';
                    }
                } else {
                    return '2';
                }
            } else {
                return '1';
            }
        } else {
            return '0';
        }
    }

    public function deleteImagen($nombreImagen) {
        if ($nombreImagen != "") {
            $nombreImagen = mb_convert_encoding($nombreImagen, "UTF-8", "ISO-8859-1");
            chmod($nombreImagen, 0777);
            unlink($nombreImagen);
        }
    }

    public function deleteCancion($nombreCancion) {
        if ($nombreCancion != "") {
            $nombreCancion = mb_convert_encoding($nombreCancion, "UTF-8", "ISO-8859-1");
            chmod($nombreCancion, 0777);
            unlink($nombreCancion);
        }
    }

}
