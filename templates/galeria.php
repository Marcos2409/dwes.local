<?php

require_once __DIR__ . '/../src/utils/files.class.php';
require_once __DIR__ . '/../src/entity/imagen.class.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);

        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
        $mensaje = "Datos enviados";
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
} else {
    $errores = [];
    $titulo = "";
    $descripcion = "";
    $mensaje = "";
}

require_once __DIR__ . '/views/galeria.view.php';
