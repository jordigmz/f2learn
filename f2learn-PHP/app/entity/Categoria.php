<?php
namespace f2learn\app\entity;

use f2learn\core\database\IEntity;

class Categoria implements IEntity
{
    private $id;
    private string $name;
    private int $numImages;

    public function __construct(string $name="", int $numImages=0)
    {
        $this->id = null;
        $this->name = $name;
        $this->numImages = $numImages;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Categoria
    {
        $this->name = $name;
        return $this;
    }

    public function getNumImages(): int
    {
        return $this->numImages;
    }

    public function setNumImages(int $numImages): Categoria
    {
        $this->numImages = $numImages;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'numImages' => $this->getNumImages()
        ];
    }
}