<?php

class Actuan {
    
    private $idPelicula;
    private $idActor;
    
    public function __construct($idPelicula, $idActor) {
        $this->idPelicula = $idPelicula;
        $this->idActor = $idActor;
    }
    
    public function getIdPelicula() {
        return $this->idPelicula;
    }

    public function getIdActor() {
        return $this->idActor;
    }

    public function setIdPelicula($idPelicula): void {
        $this->idPelicula = $idPelicula;
    }

    public function setIdActor($idActor): void {
        $this->idActor = $idActor;
    }



    
    
}