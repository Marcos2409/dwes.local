<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\repository\ImagenesRepository;
use dwes\app\repository\CategoriaRepository;
use dwes\app\entity\Imagen;
use dwes\app\entity\Asociado;
use dwes\core\Response;

class ContactController
{
    /**
     * @throws QueryException
     */
    public function index()
    {
        Response::renderView(
            'contact',
            'layout'
        );
    }
    /**
     * @throws QueryException
     */
    public function enviar()
    {
        Response::renderView(
            'contact_enviar',
            'layout'
        );
    }
}