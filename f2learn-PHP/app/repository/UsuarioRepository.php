<?php

namespace f2learn\app\repository;

use f2learn\app\entity\Usuario;
use f2learn\core\database\QueryBuilder;

class UsuarioRepository extends QueryBuilder
{
    public function __construct(string $table='users', string $classEntity=Usuario::class)
    {
        parent::__construct($table, $classEntity);
    }
}