<?php

namespace f2learn\app\entity;

use DateTime;
use f2learn\core\database\IEntity;

class Inscription implements IEntity
{

    private $id;
    private int $student;
    private int $course;
    private $date;

    public function __construct(int $student=0, int $course=0)
    {
        $this->id = null;
        $this->student = $student;
        $this->course = $course;
        $this->date = null;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getStudent(): int
    {
        return $this->student;
    }

    public function setStudent(int $student): Inscription
    {
        $this->student = $student;
        return $this;
    }

    public function getCourse(): int
    {
        return $this->course;
    }

    public function setCourse(int $course): Inscription
    {
        $this->course = $course;
        return $this;
    }

    public function getDateFormated(): string
    {
        return substr($this->date . '', 0, 10);
    }

    public function getDate(): datetime
    {
        return $this->date;
    }

    public function setDate(datetime $date): Inscription
    {
        $this->date = $date;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'student' => $this->getStudent(),
            'course' => $this->getCourse()
        ];
    }
}