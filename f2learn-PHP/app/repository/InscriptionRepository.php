<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Curso;
use f2learn\app\entity\Inscription;
use f2learn\app\entity\Usuario;
use f2learn\core\database\QueryBuilder;

class InscriptionRepository extends QueryBuilder
{
    public function __construct(string $table='inscriptions', string $classEntity=Inscription::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function getStudent(Inscription $inscription) : Usuario
    {
        $usuarioRepository = new UsuarioRepository();
        return $usuarioRepository->find($inscription->getStudent());
    }

    public function getCourse(Inscription $inscription) : Curso
    {
        $courseRepository = new CursoRepository();
        return $courseRepository->find($inscription->getCourse());
    }
}