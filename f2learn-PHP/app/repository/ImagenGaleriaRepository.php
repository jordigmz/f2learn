<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Categoria;
use f2learn\app\entity\ImagenGaleria;
use f2learn\app\exceptions\NotFoundException;
use f2learn\app\exceptions\QueryException;
use f2learn\core\database\QueryBuilder;

class ImagenGaleriaRepository extends QueryBuilder
{
    public function __construct(string $table='images', string $classEntity=ImagenGaleria::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param ImagenGaleria $imagenGaleria
     * @return Categoria
     * @throws NotFoundException
     * @throws QueryException
     */
    public function getCategoria(ImagenGaleria $imagenGaleria) : Categoria
    {
        $categoriaRepository = new CategoriaRepository();
        return $categoriaRepository->find($imagenGaleria->getCategory());
    }

    /**
     * @param ImagenGaleria $imagenGaleria
     * @throws QueryException
     */
    public function guarda(ImagenGaleria $imagenGaleria)
    {
        $fnGuardaImagen = function () use ($imagenGaleria)
        {
            $categoria = $this->getCategoria($imagenGaleria);
            $categoriaRepository = new CategoriaRepository();
            $categoriaRepository->nuevaImagen($categoria);

            $this->save($imagenGaleria);
        };

        $this->executeTransaction($fnGuardaImagen);
    }
}