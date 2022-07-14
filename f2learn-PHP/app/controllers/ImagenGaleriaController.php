<?php

namespace f2learn\app\controllers;

use f2learn\app\entity\ImagenGaleria;
use f2learn\app\exceptions\NotFoundException;
use f2learn\app\exceptions\ValidationException;
use f2learn\app\exceptions\AppException;
use f2learn\app\exceptions\FileException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\repository\CategoriaRepository;
use f2learn\app\repository\ImagenGaleriaRepository;
use f2learn\app\repository\UsuarioRepository;
use f2learn\app\utils\File;
use f2learn\core\App;
use f2learn\core\helpers\FlashMessage;
use f2learn\core\Response;

class ImagenGaleriaController
{
    /**
     * @throws AppException
     * @throws QueryException
     */
    public function gallery() {
        $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $usrActualImg = $usuarioActual->getUrlUsuario();

        $errors = FlashMessage::get('gallery-error', []);
        $checkMessage = FlashMessage::get('checkMessage');
        $description = FlashMessage::get('description');
        $categorySelected = FlashMessage::get('categorySelected');
        $imgRepository = App::getRepository(ImagenGaleriaRepository::class);
        $categoryRepository = App::getRepository(CategoriaRepository::class);

        $images = $imgRepository->findAll();
        $categories = $categoryRepository->findAll();

        Response::renderView('gallery', 'layout-admin', compact('errors', 'description', 'categorySelected', 'checkMessage', 'images', 'categories', 'imgRepository', 'usrActualImg'));
    }

    /**
     * @throws AppException
     * @throws QueryException
     */
    public function newGalleryImage() {
        try {
            $description = trim(htmlspecialchars($_POST['description']));
            if (empty($description))
                throw new ValidationException('Description cannot remain empty.');
            FlashMessage::set('description', $description);

            $category = trim(htmlspecialchars(strtolower($_POST['category'])));
            if (empty($category))
                throw new ValidationException('Category cannot remain empty.');
            FlashMessage::set('categorySelected', $category);

            $tiposAceptados = ['image/jpg', 'image/jpeg', 'image/png'];
            $image = new File($tiposAceptados, 'image');

            $image->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
            $image->copyFile(ImagenGaleria::RUTA_IMAGENES_PORTFOLIO, ImagenGaleria::RUTA_IMAGENES_GALLERY);

            $imagenGaleria = new ImagenGaleria($image->getFileName(), $description, $category);

            $imgRepository = App::getRepository(ImagenGaleriaRepository::class);
            $imgRepository->save($imagenGaleria);

            $message = 'New image uploaded: ' . $imagenGaleria->getName();
            App::get('logger')->add($message);

            FlashMessage::set('checkMessage', $message);

            FlashMessage::unset('description');
            FlashMessage::unset('categorySelected');
            FlashMessage::unset('checkMessage');

        } catch (FileException $fileException) {
            FlashMessage::set('gallery-error', [$fileException->getMessage()]);
        } catch (ValidationException $validationException) {
            FlashMessage::set('gallery-error', [$validationException->getMessage()]);
        }
            App::get('router')->redirect('gallery-images');
    }

    /**
     * @throws AppException
     * @throws QueryException
     */
    public function portfolio() {
        $imgRepository = App::getRepository(ImagenGaleriaRepository::class);

        $images = $imgRepository->findAll();

        Response::renderView('portfolio', 'layout', compact('images', 'imgRepository'));
    }

    /**
     * @param $id
     * @throws AppException
     * @throws QueryException
     * @throws NotFoundException
     */
    public function show($id)
    {
        $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $usrActualImg = $usuarioActual->getUrlUsuario();

        $image = App::getRepository(ImagenGaleriaRepository::class)->find($id);

        Response::renderView('show-gallery-image', 'layout-admin', compact('image', 'usrActualImg'));
    }
}