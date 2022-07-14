<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Asociado;
use f2learn\core\database\QueryBuilder;

class AsociadoRepository extends QueryBuilder
{
    public function __construct(string $table='partners', string $classEntity=Asociado::class)
    {
        parent::__construct($table, $classEntity);
    }
}