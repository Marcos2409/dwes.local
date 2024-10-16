<?php

require_once __DIR__ . '/../src/utils/files.class.php';
require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/database/connection.class.php';
require_once __DIR__ . '/../src/database/querybuilder.class.php';
require_once __DIR__ . '/../src/exceptions/fileexception.class.php';
require_once __DIR__ . '/../src/repository/ImagenRepository.php';

try {
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios
    $conexion = App::getConnection();

    $queryBuilder = new QueryBuilder('imagenes', 'Imagen');
    $imagenesRepository = new ImagenesRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php

        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

        $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion);
        $imagenesRepository->save($imagenGaleria);

        $mensaje = "Se ha guardado la imagen correctamente";
        $imagenes = $imagenesRepository->findAll();
    } else {
        $descripcion = "";
        $titulo = "";
    }
    $queryBuilder = new QueryBuilder('imagenes', 'Imagen');
    $imagenes = $queryBuilder->findAll();
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $fileException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
}

require_once 'views/galeria.view.php';
