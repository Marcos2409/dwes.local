<?php

require_once __DIR__ . '/../../src/utils/files.class.php';
require_once __DIR__ . '/../../src/entity/imagen.class.php';
require_once __DIR__ . '/../../src/database/connection.class.php';
require_once __DIR__ . '/../../src/database/querybuilder.class.php';
require_once __DIR__ . '/../../src/exceptions/fileexception.class.php';
require_once __DIR__ . '/../../src/repository/ImagenRepository.php';
require_once __DIR__ . '/../../src/repository/CategoriaRepository.php';

$errores = [];
$descripcion = '';
$mensaje = '';

try {
 $imagenGaleriaRepository = new ImagenesRepository();
 $categoriaRepository = new CategoriaRepository();
 $imagenes = $imagenGaleriaRepository->findAll();
 $categorias = $categoriaRepository->findAll();
}
catch ( QueryException $queryException ){
 $errores[] = $queryException->getMessage();
}
catch ( AppException $appException ){
 $errores[] = $appException->getMessage();
}
require_once __DIR__ . '/../views/galeria.view.php';