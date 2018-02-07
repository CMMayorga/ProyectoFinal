<?php

class Cancion {

    private $id, $titulo, $autor, $ruta, $idalbum;

    function __construct($id, $titulo, $autor, $ruta, $idalbum) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ruta = $ruta;
        $this->idalbum = $idalbum;
    }

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getIdalbum() {
        return $this->idalbum;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setIdalbum($idalbum) {
        $this->idalbum = $idalbum;
    }

}
