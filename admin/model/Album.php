<?php

class Album {

    private $id, $nombre, $fecha, $caratula;

    function __construct($id, $nombre, $fecha, $caratula) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->caratula = $caratula;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getCaratula() {
        return $this->caratula;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setCaratula($caratula) {
        $this->caratula = $caratula;
    }

}
