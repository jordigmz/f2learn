<?php
namespace f2learn\app\utils;

use f2learn\app\exceptions\FileException;

class File
{
    private array $file;
    private string $fileName;

    /**
     * @param array $arrTypes
     * @param string $fileName
     * @throws FileException
     */
    public function __construct(array $arrTypes, string $fileName)
    {
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if(!isset($this->file))
            throw new FileException('You must select a file');

        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new FileException('File is too large');

                case UPLOAD_ERR_PARTIAL:
                    throw new FileException('Unable to upload complete file');
                default:
                    throw new FileException('File upload error');
                    break;
            }
        }

        if (in_array($this->file['type'], $arrTypes) === false)
            throw new FileException('File type not supported');
    }

    public function getFileName() {
        return $this->fileName;
    }

    /**
     * @param string $rutaDestino
     * @throws FileException
     */
    public function saveUploadFile(string $rutaDestino) {
        if (is_uploaded_file($this->file['tmp_name']) === false)
            throw new FileException('File has not been uploaded using a form');

        $this->fileName = $this->file['name'];
        $ruta = $rutaDestino . $this->fileName;

        if (is_file($ruta) === true) {
            $idUnico = time();
            $this->fileName = $idUnico . '_' . $this->fileName;
            $ruta = $rutaDestino . $this->fileName;
        }

        if (move_uploaded_file($this->file['tmp_name'], $ruta) === false)
            throw new FileException('Cannot move the file to its destination');
    }

    /**
     * @param string $rutaOrigen
     * @param string $rutaDestino
     * @throws FileException
     */
    public function copyFile(string $rutaOrigen, string $rutaDestino) {
        $origen = $rutaOrigen . $this->fileName;
        $destino = $rutaDestino . $this->fileName;

        //TODO: Reducir tamaño imágenes

        if (is_file($origen) === false)
            throw new FileException("File $origen could not be copied because it does not exist");

        if (is_file($destino) === true)
            throw new FileException("File $destino cannot be overwritten because it already exists");

        if (copy($origen, $destino) === false)
            throw new FileException("Failed to copy $origen file to $destino");
    }
}