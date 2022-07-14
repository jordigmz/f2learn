<?php
namespace f2learn\app\entity;

use f2learn\core\database\IEntity;
use DateTime;

class Post implements IEntity
{
    const RUTA_IMAGENES_BLOG = 'assets/images/blog/';

    private $id;
    private string $image;
    private $date;
    private string $title;
    private string $description;

    public function __construct(string $image="", string $title="", string $description="")
    {
        $this->id = null;
        $this->image = $image;
        $this->date = null;
        $this->title = $title;
        $this->description = $description;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Post
    {
        $this->image = $image;
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

    public function setDate(datetime $date): Post
    {
        $this->date = $date;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Post
    {
        $this->description = $description;
        return $this;
    }

    public function getUrlPost()
    {
        return self::RUTA_IMAGENES_BLOG . $this->getImage();
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'image' => $this->getImage(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription()
        ];
    }
}