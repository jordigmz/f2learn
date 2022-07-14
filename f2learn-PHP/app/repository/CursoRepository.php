<?php
namespace f2learn\app\repository;

use f2learn\app\entity\Assessment;
use f2learn\app\entity\Curso;
use f2learn\app\entity\Language;
use f2learn\app\entity\Level;
use f2learn\core\database\QueryBuilder;

class CursoRepository extends QueryBuilder
{
    public function __construct(string $table='courses', string $classEntity=Curso::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function getLevel(Curso $course) : Level
    {
        $levelRepository = new LevelRepository();
        return $levelRepository->find($course->getLevel());
    }

    public function getLanguage(Curso $course) : Language
    {
        $languageRepository = new LanguageRepository();
        return $languageRepository->find($course->getLanguage());
    }

    public function getAssessment(Curso $course) : Assessment
    {
        $assessmentRepository = new AssessmentRepository();
        return $assessmentRepository->find($course->getAssessments());
    }

    public function enrollCourse(Curso $course) {
        $course->setStudents($course->getStudents()+1);

        $this->update($course);
    }
}