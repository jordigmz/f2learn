<?php

namespace App\Entity;

use App\Entity\Users as Users;
use App\Entity\Courses as Courses;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Inscriptions
 *
 * @ORM\Table(name="inscriptions", indexes={@ORM\Index(name="fk_course_inscription", columns={"course"}), @ORM\Index(name="fk_student_inscription", columns={"student"})})
 * @ORM\Entity
 */
class Inscriptions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student", referencedColumnName="id")
     * })
     */
    private $student;

    /**
     * @var Courses
     *
     * @ORM\ManyToOne(targetEntity="Courses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course", referencedColumnName="id")
     * })
     */
    private $course;

    public function __construct(Users $student, Courses $course)
    {
        $this->student = $student;
        $this->course = $course;
        $this->date = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStudent(): ?Users
    {
        return $this->student;
    }

    public function setStudent(?Users $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getCourse(): ?Courses
    {
        return $this->course;
    }

    public function setCourse(?Courses $course): self
    {
        $this->course = $course;

        return $this;
    }


}
