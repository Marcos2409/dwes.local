<?php
namespace dwes\app\entity;
use dwes\app\entity\IEntity;
class Asociado {
    private $id;
    private $nombre;
    private $logo;
    private $descripcion;
    private $RUTA_LOGOS_ASOCIADOS = __DIR__ . '/../public/images/asociados';

    public function __construct($nombre = "", $descripcion = "", $logo = "", $RUTA_LOGOS_ASOCIADOS) {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->logo = $logo;
        $this->RUTA_LOGOS_ASOCIADOS = $RUTA_LOGOS_ASOCIADOS;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getRutaLogosAsociados() {
        return $this->RUTA_LOGOS_ASOCIADOS;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function __toString()
    {
        return "Descripción del logo";
    }
}
