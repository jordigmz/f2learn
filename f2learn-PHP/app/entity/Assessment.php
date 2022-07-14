<?php
namespace f2learn\app\entity;

use f2learn\core\database\IEntity;

class Assessment implements IEntity
{
    private $id;
    private string $name;

    public function __construct(string $name="")
    {
        $this->id = null;
        $this->name = $name;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Assessment
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }
}