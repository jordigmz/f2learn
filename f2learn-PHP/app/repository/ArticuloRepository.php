<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Articulo;
use f2learn\app\entity\Usuario;
use f2learn\core\database\QueryBuilder;

class ArticuloRepository extends QueryBuilder
{
    public function __construct(string $table='articulos', string $classEntity=Articulo::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function getUsuario(Articulo $articulo) : Usuario
    {
        $usuarioRepository = new UsuarioRepository();
        return $usuarioRepository->find($articulo->getUsuario());
    }
}