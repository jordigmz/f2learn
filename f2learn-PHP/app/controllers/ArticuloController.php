<?php

namespace f2learn\app\controllers;

use f2learn\app\entity\Articulo;
use f2learn\app\exceptions\AppException;
use f2learn\app\exceptions\FileException;
use f2learn\app\exceptions\NotFoundException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\exceptions\ValidationException;
use f2learn\app\repository\ArticuloRepository;
use f2learn\app\repository\UsuarioRepository;
use f2learn\app\utils\File;
use f2learn\core\App;
use f2learn\core\helpers\FlashMessage;
use f2learn\core\Response;

class ArticuloController
{
    /**
     * @throws AppException
     * @throws QueryException
     */
    public function articulos() {
        $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $usrActualImg = $usuarioActual->getUrlUsuario();

        $errors = FlashMessage::get('articulos-error', []);
        $checkMessage = FlashMessage::get('checkMessage');

        $nombre = FlashMessage::get('nombre');
        $precio = FlashMessage::get('precio');
        $fecha_caducidad = FlashMessage::get('fecha_caducidad');
        $descripcion = FlashMessage::get('descripcion');

        $articuloRepository = App::getRepository(ArticuloRepository::class);
        if ($usuarioActual->getRole() !== 'ROLE_ADMIN') {
            $articulos = $articuloRepository->findBy(['usuario' => $usuarioActual->getId()]);
        } else {
            $articulos = $articuloRepository->findAll();
        }

        Response::renderView('articulos', 'layout-admin', compact('articulos', 'articuloRepository', 'errors', 'checkMessage', 'nombre', 'precio', 'fecha_caducidad', 'descripcion', 'usrActualImg'));
    }

    /**
     * @throws AppException
     * @throws NotFoundException
     * @throws QueryException
     */
    public function nuevoArticulo()
    {
        try {
            $nombre = trim(htmlspecialchars($_POST['nombre']));
            if (empty($nombre))
                throw new ValidationException('El nombre no puede quedar vacío');

            FlashMessage::set('nombre', $nombre);

            $precio = trim(htmlspecialchars($_POST['precio']));
            if (empty($precio))
                throw new ValidationException('El precio no puede quedar vacío');

            FlashMessage::set('precio', $precio);

            $fecha_caducidad = trim(htmlspecialchars($_POST['fecha_caducidad']));
            if (empty($fecha_caducidad))
                throw new ValidationException('La fecha de caducidad no puede quedar vacía');

            FlashMessage::set('fecha_caducidad', $fecha_caducidad);

            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            if (empty($descripcion))
                throw new ValidationException('La descripción no puede quedar vacía');

            FlashMessage::set('descripcion', $descripcion);

            $tiposAceptados = ['image/png', 'image/jpg', 'image/jpeg'];
            $image = new File($tiposAceptados, 'image');

            $image->saveUploadFile(Articulo::RUTA_IMAGENES_ARTICULOS);

            $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
            $usuario = $usuarioActual->getId();

            $usuarioNombre = ucfirst($usuarioActual->getName());
            FlashMessage::set('usuarioNombre', $usuarioNombre);

            $articulo = new Articulo(
                $nombre,
                $precio,
                $fecha_caducidad,
                $image->getFileName(),
                $descripcion,
                $usuario,
            );

            $articuloRepository = App::getRepository(ArticuloRepository::class);
            $articuloRepository->save($articulo);

            $checkMessage = 'Nuevo artículo añadido: ' . $articulo->getNombre() . ' por ' . ucfirst($usuarioNombre);
            App::get('logger')->add($checkMessage);

            FlashMessage::set('checkMessage', $checkMessage);

            FlashMessage::unset('nombre');
            FlashMessage::unset('precio');
            FlashMessage::unset('fecha_caducidad');
            FlashMessage::unset('descripcion');
            FlashMessage::unset('usuarioNombre');
            FlashMessage::unset('checkMessage');

        } catch (ValidationException $validationException) {
            FlashMessage::set('articulos-error', [$validationException->getMessage()]);
        } catch (FileException $fileException) {
            FlashMessage::set('articulos-error', [$fileException->getMessage()]);
        }

        App::get('router')->redirect('articulos');
    }

    /**
     * @param $id
     * @throws AppException
     * @throws NotFoundException
     * @throws QueryException
     */
    public function show($id)
    {
        $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $usrActualImg = $usuarioActual->getUrlUsuario();

        $articulo = App::getRepository(ArticuloRepository::class)->find($id);
        $user2 = App::getRepository(UsuarioRepository::class)->find($articulo->getUsuario());
        $usuario = $user2->getUsername();

        Response::renderView('articulo', 'layout-admin', compact('articulo', 'usuario', 'usrActualImg'));
    }
}