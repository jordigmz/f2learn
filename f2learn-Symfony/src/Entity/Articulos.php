<?php

namespace App\Entity;

use App\Entity\Users as Users;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Articulos
 *
 * @ORM\Table(name="articulos", uniqueConstraints={@ORM\UniqueConstraint(name="articulo_nombre_uindex", columns={"nombre"})}, indexes={@ORM\Index(name="fk_user_articulos", columns={"usuario"})})
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={
 *     @ORM\UniqueConstraint(columns={"nombre"})}
 * )
 * @UniqueEntity("nombre", message="The name entered already exists.")
 */
class Articulos
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
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "The name must be at least {{ limit }} characters long",
     *      maxMessage = "The name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer", nullable=false)
     * @Assert\NotBlank
     * @Assert\Positive
     */
    private $precio;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="fecha_caducidad", type="datetime", nullable=false)
     * @Assert\NotBlank
     */
    private $fechaCaducidad;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\File(mimeTypes={ "image/jpg", "image/jpeg", "image/png" }, maxSize = "1024k")
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;

    /**
     * @var Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return int
     */
    public function getPrecio(): int
    {
        return $this->precio;
    }

    /**
     * @param int $precio
     */
    public function setPrecio(int $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return DateTimeInterface
     */
    public function getFechaCaducidad(): DateTimeInterface
    {
        return $this->fechaCaducidad;
    }

    /**
     * @param DateTimeInterface $fechaCaducidad
     * @return $this
     */
    public function setFechaCaducidad(DateTimeInterface $fechaCaducidad): self
    {
        $this->fechaCaducidad = $fechaCaducidad;

        return $this;
    }

    /**
     * @return string
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * @param string $imagen
     */
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return Users
     */
    public function getUsuario(): Users
    {
        return $this->usuario;
    }

    /**
     * @param Users $usuario
     */
    public function setUsuario(Users $usuario): void
    {
        $this->usuario = $usuario;
    }


}
