<?php

namespace App\Entity;

use App\Entity\Categories as Categories;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Images
 *
 * @ORM\Table(name="images", uniqueConstraints={@ORM\UniqueConstraint(name="images_nombre_uindex", columns={"name"})}, indexes={@ORM\Index(name="fk_category_image", columns={"category"})})
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"name"})}
 * )
 * @UniqueEntity("name", message="The image uploaded already exists.")
 */
class Images
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\File(mimeTypes={ "image/jpg", "image/jpeg", "image/png" }, maxSize = "1024k")
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="numLikes", type="integer", nullable=false)
     */
    private $numlikes = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="numDownloads", type="integer", nullable=false)
     */
    private $numdownloads = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="numVisualizations", type="integer", nullable=false)
     */
    private $numvisualizations = '0';

    /**
     * @var Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id", nullable=false)
     * })
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNumlikes(): ?int
    {
        return $this->numlikes;
    }

    public function setNumlikes(int $numlikes): self
    {
        $this->numlikes = $numlikes;

        return $this;
    }

    public function getNumdownloads(): ?int
    {
        return $this->numdownloads;
    }

    public function setNumdownloads(int $numdownloads): self
    {
        $this->numdownloads = $numdownloads;

        return $this;
    }

    public function getNumvisualizations(): ?int
    {
        return $this->numvisualizations;
    }

    public function setNumvisualizations(int $numvisualizations): self
    {
        $this->numvisualizations = $numvisualizations;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }


}
