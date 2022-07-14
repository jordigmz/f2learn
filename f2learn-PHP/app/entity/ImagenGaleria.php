<?php
namespace f2learn\app\entity;

use f2learn\core\database\IEntity;

class ImagenGaleria implements IEntity
{
    const RUTA_IMAGENES_PORTFOLIO = 'assets/images/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'assets/images/gallery/';

    private $id;
    private string $name;
    private string $description;
    private int $category;
    private int $numVisualizations;
    private int $numLikes;
    private int $numDownloads;

    /**
     * @param string $name
     * @param string $description
     * @param int $category
     * @param int $numVisualizations
     * @param int $numLikes
     * @param int $numDownloads
     */
    public function __construct(string $name="", string $description="", int $category=0, int $numVisualizations=0, int $numLikes=0, int $numDownloads=0)
    {
        $this->id = null;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->numVisualizations = $numVisualizations;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    public function __toString(): string
    {
        return $this->getDescription();
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ImagenGaleria
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): ImagenGaleria
    {
        $this->description = $description;
        return $this;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setCategory(int $category): ImagenGaleria
    {
        $this->category = $category;
        return $this;
    }

    public function getNumVisualizations(): int
    {
        return $this->numVisualizations;
    }

    public function setNumVisualizations(int $numVisualizations): ImagenGaleria
    {
        $this->numVisualizations = $numVisualizations;
        return $this;
    }

    public function getNumLikes(): int
    {
        return $this->numLikes;
    }

    public function setNumLikes(int $numLikes): ImagenGaleria
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    public function setNumDownloads(int $numDownloads): ImagenGaleria
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    public function getUrlPortfolio() : string
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getName();
    }

    public function getUrlGallery() : string
    {
        return self::RUTA_IMAGENES_GALLERY . $this->getName();
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'category' => $this->getCategory(),
            'numVisualizations' => $this->getNumVisualizations(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads()
        ];
    }
}