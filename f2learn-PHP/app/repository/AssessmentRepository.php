<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Assessment;
use f2learn\core\database\QueryBuilder;

class AssessmentRepository extends QueryBuilder
{
    public function __construct(string $table='assessments', string $classEntity=Assessment::class)
    {
        parent::__construct($table, $classEntity);
    }
}