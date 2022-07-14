<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Categoria;
use f2learn\app\exceptions\QueryException;
use f2learn\core\database\QueryBuilder;


class CategoriaRepository extends QueryBuilder
{
    public function __construct(string $table='categories', string $classEntity=Categoria::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param Categoria $categoria
     * @throws QueryException
     */
    public function nuevaImagen(Categoria $categoria) {
        $categoria->setNumImages($categoria->getNumImages()+1);

        $this->update($categoria);
    }
}