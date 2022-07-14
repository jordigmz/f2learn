<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Mensaje;
use f2learn\core\database\QueryBuilder;

class MensajeRepository extends QueryBuilder
{
    public function __construct(string $table='contact', string $classEntity=Mensaje::class)
    {
        parent::__construct($table, $classEntity);
    }
}