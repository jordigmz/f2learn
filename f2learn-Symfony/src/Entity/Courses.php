<?php

namespace App\Entity;

use App\Entity\Users as Users;
use App\Entity\Levels as Levels;
use App\Entity\Languages as Languages;
use App\Entity\Assessments as Assessments;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Courses
 *
 * @ORM\Table(name="courses", uniqueConstraints={@ORM\UniqueConstraint(name="title", columns={"title"})}, indexes={@ORM\Index(name="fk_assessment_course", columns={"assessments"}), @ORM\Index(name="fk_instructor_course", columns={"instructor"}), @ORM\Index(name="fk_level_course", columns={"level"}), @ORM\Index(name="fk_language_course", columns={"language"})})
 * @ORM\Entity(repositoryClass="App\Repository\CoursesRepository")
 * @ORM\Table(uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"title"})}
 * )
 * @UniqueEntity("title", message="The title entered already exists.")
 */
class Courses
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $duration;

    /**
     * @var int|null
     *
     * @ORM\Column(name="students", type="integer", nullable=true)
     */
    private $students=0;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     * @Assert\NotBlank
     */
    private $price;

    /**
     * @var Languages
     *
     * @ORM\ManyToOne(targetEntity="Languages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language", referencedColumnName="id")
     * })
     */
    private $language;

    /**
     * @var Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instructor", referencedColumnName="id")
     * })
     */
    private $instructor='Admin';

    /**
     * @var Levels
     *
     * @ORM\ManyToOne(targetEntity="Levels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="level", referencedColumnName="id")
     * })
     */
    private $level;

    /**
     * @var Assessments
     *
     * @ORM\ManyToOne(targetEntity="Assessments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assessments", referencedColumnName="id")
     * })
     */
    private $assessments;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getStudents(): ?int
    {
        return $this->students;
    }

    public function setStudents(?int $students): self
    {
        $this->students = $students;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLanguage(): ?Languages
    {
        return $this->language;
    }

    public function setLanguage(?Languages $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getInstructor(): ?Users
    {
        return $this->instructor;
    }

    public function setInstructor(?Users $instructor): self
    {
        $this->instructor = $instructor;

        return $this;
    }

    public function getLevel(): ?Levels
    {
        return $this->level;
    }

    public function setLevel(?Levels $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getAssessments(): ?Assessments
    {
        return $this->assessments;
    }

    public function setAssessments(?Assessments $assessments): self
    {
        $this->assessments = $assessments;

        return $this;
    }


}
