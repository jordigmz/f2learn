<?php
namespace f2learn\app\entity;

use f2learn\core\database\IEntity;

class Articulo implements IEntity
{
    const RUTA_IMAGENES_ARTICULOS = 'assets/images/articulos/';

    private $id;
    private string $nombre;
    private string $precio;
    private string $fecha_caducidad;
    private string $imagen;
    private string $descripcion;
    private int $usuario;

    public function __construct(string $nombre='', string $precio='', string $fecha_caducidad='', string $imagen='', string $descripcion='', int $usuario=0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->fecha_caducidad = $fecha_caducidad;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->usuario = $usuario;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Articulo
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPrecio(): string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): Articulo
    {
        $this->precio = $precio;
        return $this;
    }

    public function getFechaCaducidad(): string
    {
        return $this->fecha_caducidad;
    }

    public function setFechaCaducidad(string $fecha_caducidad): Articulo
    {
        $this->fecha_caducidad = $fecha_caducidad;
        return $this;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): Articulo
    {
        $this->imagen = $imagen;
        return $this;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): Articulo
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getUsuario(): int
    {
        return $this->usuario;
    }

    public function setUsuario(int $usuario): Articulo
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getUrlArticulo()
    {
        return self::RUTA_IMAGENES_ARTICULOS . $this->getImagen();
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'precio' => $this->getPrecio(),
            'fecha_caducidad' => $this->getFechaCaducidad(),
            'imagen' => $this->getImagen(),
            'descripcion' => $this->getDescripcion(),
            'usuario' => $this->getUsuario()
        ];
    }
}