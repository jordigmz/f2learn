<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Language;
use f2learn\core\database\QueryBuilder;


class LanguageRepository extends QueryBuilder
{
    public function __construct(string $table='languages', string $classEntity=Language::class)
    {
        parent::__construct($table, $classEntity);
    }
}