<?php
class Imagen
{
    private $id;
    private $nombre;
    private $logo;
    private $descripcion;
    private $RUTA_LOGOS_ASOCIADOS=__DIR__ . '/../images/logo';

    public function __construct($nombre = "", $descripcion= "", $logo= "")
    {
        $id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->logo = $logo;
        
    }


}