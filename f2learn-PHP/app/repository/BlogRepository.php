<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Post;
use f2learn\core\database\QueryBuilder;

class BlogRepository extends QueryBuilder
{
    public function __construct(string $table='blog', string $classEntity=Post::class)
    {
        parent::__construct($table, $classEntity);
    }
}