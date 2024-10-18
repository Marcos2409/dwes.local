<?php

require_once __DIR__ . '/../src/utils/files.class.php';
require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/database/connection.class.php';
require_once __DIR__ . '/../src/database/querybuilder.class.php';
require_once __DIR__ . '/../src/exceptions/fileexception.class.php';
require_once __DIR__ . '/../src/repository/ImagenRepository.php';
require_once __DIR__ . '/../src/repository/CategoriaRepository.php';

try {
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios
    $conexion = App::getConnection();

    $queryBuilder = new QueryBuilder('imagenes', 'Imagen');
    $imagenesRepository = new ImagenesRepository();
    $categoriaRepository = new CategoriaRepository();
    $categorias = $categoriaRepository->findAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        if ( empty($categoria))
            throw new CategoriaException;
        
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php

        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

        $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
        $imagenesRepository->guarda($imagenGaleria);

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
}catch ( CategoriaException ) {
    $errores[] = "No se ha seleccionado una categoría válida";
    }
   

require_once 'views/galeria.view.php';
