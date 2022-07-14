<?php
namespace f2learn\app\entity;

use f2learn\core\database\IEntity;

class Asociado implements IEntity
{
    const RUTA_IMAGENES_ASOCIADOS = 'assets/images/partners/';

    private $id;
    private string $name;
    private string $logo;
    private string $description;

    public function __construct(string $name='', string $logo='', string $description='')
    {
        $this->id = null;
        $this->name = $name;
        $this->logo = $logo;
        $this->description = $description;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Asociado
    {
        $this->name = $name;
        return $this;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Asociado
    {
        $this->description = $description;
        return $this;
    }

    public function getUrlAsociados()
    {
        return self::RUTA_IMAGENES_ASOCIADOS . $this->getLogo();
    }

    public function toArray() : array
    {
        return [
          'id' => $this->getId(),
          'name' => $this->getName(),
          'logo' => $this->getLogo(),
          'description' => $this->getDescription()
        ];
    }
}