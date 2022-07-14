<?php

namespace f2learn\app\entity;

use f2learn\core\database\IEntity;

class Usuario implements IEntity
{
    const RUTA_IMAGENES_USUARIOS = 'assets/images/profile/';

    /**
     * @var int
     */
    private $id;
    private string $name;
    private string $email;
    private string $image;
    private string $username;
    private string $password;
    private string $role;
    private string $language;

    /**
     * @param string $name
     * @param string $email
     * @param string $image
     * @param string $username
     * @param string $password
     * @param string $role
     */
    public function __construct(string $name='', string $email='', string $image='guest.jpg', string $username='', string $password='', string $role='', string $language='en_GB')
    {
        $this->id = null;
        $this->name = $name;
        $this->email = $email;
        $this->image = $image;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->language = $language;
    }

    /**
     * @return int|null
     */
    public function getId() : ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Usuario
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Usuario
    {
        $this->email = $email;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Usuario
    {
        $this->image = $image;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): Usuario
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Usuario
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): Usuario
    {
        $this->role = $role;
        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): Usuario
    {
        $this->language = $language;
        return $this;
    }

    public function getUrlUsuario() : string
    {
        return self::RUTA_IMAGENES_USUARIOS . $this->getImage();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'image' => $this->getImage(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'role' => $this->getRole(),
            'language' => $this->getLanguage()
        ];
    }
}