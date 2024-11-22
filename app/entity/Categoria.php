<?php

namespace dwes\app\entity;
use dwes\app\entity\IEntity;

class Categoria implements IEntity {
    private $id;
    private $nombre;
    private $numImagenes;

    public function __construct($nombre = "", $numImagenes = "") {
        $this->id = null;
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNumImagenes() {
        return $this->numImagenes;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setNumImagenes($numImagenes) {
        $this->numImagenes = $numImagenes;
    }
    
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'numImagenes' => $this->getNumImagenes()
        ];
    }
   
    public function __toString()
    {
        return $this->getNombre();
    }
}
