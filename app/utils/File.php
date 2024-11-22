<?php
namespace dwes\app\utils;

use dwes\app\exceptions\FileException;

class File
{
    private $file;
    private $fileName;
    /**
     * param string $fileName
     * param array $arrTypes
     * @throws FileException
     */
    public function __construct(string $fileName, array $arrTypes)
    {
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if (!isset($this->file)) {
            throw new FileException('Debes seleccionar un fichero');
            return;
        }

        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            // Handle the error based on the type of error
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    throw new FileException('Debes seleccionar un fichero');

                case UPLOAD_ERR_FORM_SIZE:
                    throw new FileException('No se ha podido subir el fichero completo');

                case UPLOAD_ERR_PARTIAL:

                    // Add logic to handle these errors
                    break;

                default:
                    throw new FileException('No se ha podido subir el fichero');
                    break;
            }
        }

        // Check if file type is allowed
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $rutaDestino
     * @return void
     * @throws FileException
     */
    public function saveUploadFile(string $rutaDestino)
    {
        // Primero hay que comprobar que el fichero se ha subido desde el formulario.
        // Hay un tipo de ataques que intenta acceder a archivos del SO
        if (is_uploaded_file($this->file['tmp_name']) === false)
            throw new FileException('El archivo no ha sido subido mediante un formulario.');
        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;
        // Comprobamos si ya existe el fichero
        if (is_file($ruta) === true) {
            // Generamos un nombre aleatorio
            $idUnico = time();
            $this->fileName = $idUnico . "_" . $this->fileName;
            $ruta = $rutaDestino . $this->fileName;
        }
        echo $_SERVER['DOCUMENT_ROOT'] . '/' . $ruta;
        if (
            move_uploaded_file($this->file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/' . $ruta) ===
            false
        ) {

            throw new FileException('No se puede mover el archivo a su destino');
        }
    }
}
