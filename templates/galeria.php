<?php

require_once __DIR__ . '/../src/utils/files.class.php';
require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/database/connection.class.php';
require_once __DIR__ . '/../src/database/querybuilder.class.php';
require_once __DIR__ . '/../src/exceptions/fileexception.class.php';

try {
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios
    $conexion = App::getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
        $sql = "INSERT INTO imagenes (nombre, descripcion, categoria) VALUES
     (:nombre,:descripcion,:categoria)";
        $pdoStatement = $conexion->prepare($sql);
        $parametros = [
            ':nombre' => $imagen->getFileName(),
            ':descripcion' => $descripcion,
            ':categoria' => '1'
        ];
        if ($pdoStatement->execute($parametros) === false)
            $errores[] = "No se ha podido guardar la imagen en la base de datos";
        else
            $mensaje = "Se ha guardado la imagen correctamente";
    } else {
        $descripcion = "";
        $titulo = "";
    }
    $queryBuilder = new QueryBuilder('imagenes','Imagen');
    $imagenes = $queryBuilder->findAll();
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $fileException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
}

require_once 'views/galeria.view.php';
