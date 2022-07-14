<?php

namespace f2learn\app\entity;

use f2learn\core\database\IEntity;

class Curso implements IEntity
{
    const RUTA_IMAGENES_CURSOS = 'assets/images/courses/';

    private $id;
    private string $title;
    private string $image;
    private string $description;
    private string $duration;
    private int $level;
    private int $language;
    private int $students;
    private int $assessments;
    private int $instructor;
    private string $price;

    public function __construct(string $title='', string $image='', string $description='', string $duration='', int $level=0, int $language=0, int $assessments=0, int $instructor=0, string $price='')
    {
        $this->id = null;
        $this->title = $title;
        $this->image = $image;
        $this->description = $description;
        $this->duration = $duration;
        $this->level = $level;
        $this->language = $language;
        $this->students = 0;
        $this->assessments = $assessments;
        $this->instructor = $instructor;
        $this->price = $price;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Curso
    {
        $this->title = $title;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Curso
    {
        $this->image = $image;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Curso
    {
        $this->description = $description;
        return $this;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): Curso
    {
        $this->duration = $duration;
        return $this;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): Curso
    {
        $this->level = $level;
        return $this;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function setLanguage(int $language): Curso
    {
        $this->language = $language;
        return $this;
    }

    public function getStudents(): int
    {
        return $this->students;
    }

    public function setStudents(int $students): Curso
    {
        $this->students = $students;
        return $this;
    }

    public function getAssessments(): int
    {
        return $this->assessments;
    }

    public function setAssessments(int $assessments): Curso
    {
        $this->assessments = $assessments;
        return $this;
    }

    public function getInstructor(): int
    {
        return $this->instructor;
    }

    public function setInstructor(int $instructor): Curso
    {
        $this->instructor = $instructor;
        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): Curso
    {
        $this->price = $price;
        return $this;
    }

    public function getUrlCourse(): string
    {
        return self::RUTA_IMAGENES_CURSOS . $this->getImage();
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'image' => $this->getImage(),
            'description' => $this->getDescription(),
            'duration' => $this->getDuration(),
            'level' => $this->getLevel(),
            'language' => $this->getLanguage(),
            'students' => $this->getStudents(),
            'assessments' => $this->getAssessments(),
            'instructor' => $this->getInstructor(),
            'price' => $this->getPrice()
        ];
    }
}