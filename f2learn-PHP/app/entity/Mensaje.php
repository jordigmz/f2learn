<?php
namespace f2learn\app\entity;

use f2learn\core\database\IEntity;
use DateTime;

class Mensaje implements IEntity
{
    private $id;
    private string $name;
    private string $email;
    private string $phone;
    private string $subject;
    private string $message;
    private $date;

    public function __construct(string $name='', string $email='', string $phone='', string $subject='', string $message='')
    {
        $this->id = null;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->message = $message;
        $this->date = null;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Mensaje
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Mensaje
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): Mensaje
    {
        $this->phone = $phone;
        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): Mensaje
    {
        $this->subject = $subject;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): Mensaje
    {
        $this->message = $message;
        return $this;
    }

    public function getDate(): datetime
    {
        return $this->date;
    }

    public function setDate(datetime $date): Mensaje
    {
        $this->date = $date;
        return $this;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'subject' => $this->getSubject(),
            'message' => $this->getMessage()
        ];
    }
}