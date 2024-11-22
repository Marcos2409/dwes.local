<?php

namespace dwes\app\controllers;

use dwes\core\App;
use dwes\app\repository\ImagenesRepository;
use dwes\app\repository\CategoriaRepository;
use dwes\app\entity\Imagen;
use dwes\app\entity\Asociado;
use dwes\core\Response;

class PagesController
{
    /**
     * @throws QueryException
     */
    public function index()
    {
        $imagenesHome[] = new Imagen('1.jpg', 'descripción imagen 1', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('2.jpg', 'descripción imagen 2', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('3.jpg', 'descripción imagen 3', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('4.jpg', 'descripción imagen 4', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('5.jpg', 'descripción imagen 5', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('6.jpg', 'descripción imagen 6', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('7.jpg', 'descripción imagen 7', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('8.jpg', 'descripción imagen 8', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('9.jpg', 'descripción imagen 9', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('10.jpg', 'descripción imagen 10', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('11.jpg', 'descripción imagen 11', 1, 456, 610, 130);
        $imagenesHome[] = new Imagen('12.jpg', 'descripción imagen 12', 1, 456, 610, 130);

        $logosAsociados[] = new Asociado('Logo1', 'Descripción logo 1', 'log1.jpg', '/public/images/asociados/log1.jpg');
        $logosAsociados[] = new Asociado('Logo2', 'Descripción logo 2', 'log2.jpg', '/public/images/asociados/log2.jpg');
        $logosAsociados[] = new Asociado('Logo3', 'Descripción logo 3', 'log3.jpg', '/public/images/asociados/log3.jpg');
        $imagenGaleria = App::getRepository(ImagenesRepository::class)->findAll();
        /* $asociadosLista = App::getRepository(AsociadosRepository::class)->findAll(); */
        Response::renderView(
            'index',
            'layout',
            compact('imagenesHome', 'logosAsociados')
        );
    }
    public function about()
    {
        $imagenesClientes[] = new Imagen('client1.jpg', 'MISS BELLA');
        $imagenesClientes[] = new Imagen('client2.jpg', 'DON PENO');
        $imagenesClientes[] = new Imagen('client3.jpg', 'SWEETY');
        $imagenesClientes[] = new Imagen('client4.jpg', 'LADY');
        Response::renderView(
            'about',
            'layout',
            compact('imagenesClientes')
        );
    }
    public function blog()
    {
        Response::renderView(
            'blog',
            'layout',
        );
    }
    public function post()
    {
        Response::renderView(
            'single_post',
            'layout',
        );
    }
}
