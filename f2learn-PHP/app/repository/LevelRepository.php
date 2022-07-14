<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Level;
use f2learn\core\database\QueryBuilder;


class LevelRepository extends QueryBuilder
{
    public function __construct(string $table='levels', string $classEntity=Level::class)
    {
        parent::__construct($table, $classEntity);
    }
}