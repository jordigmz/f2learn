<?php

namespace f2learn\app\controllers;

use f2learn\app\entity\Asociado;
use f2learn\app\exceptions\ValidationException;
use f2learn\app\exceptions\FileException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\exceptions\AppException;
use f2learn\app\repository\AsociadoRepository;
use f2learn\app\repository\UsuarioRepository;
use f2learn\app\utils\File;
use f2learn\app\utils\Utils;
use f2learn\core\App;
use f2learn\core\helpers\FlashMessage;
use f2learn\core\Response;

class AsociadoController
{
    /**
     * @throws AppException
     * @throws QueryException
     */
    public function partners() {
        $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $usrActualImg = $usuarioActual->getUrlUsuario();

        $errors = FlashMessage::get('partner-error', []);
        $checkMessage = FlashMessage::get('checkMessage');
        $name = FlashMessage::get('name');
        $description = FlashMessage::get('description');

        $partnerRepository = App::getRepository(AsociadoRepository::class);
        $partners = $partnerRepository->findAll();

        Response::renderView('partners', 'layout-admin', compact('partners', 'errors', 'checkMessage', 'name', 'description', 'usrActualImg'));
    }

    public function newPartner()
    {
        try {
            $name = trim(htmlspecialchars($_POST['name']));
            if (empty($name))
                throw new ValidationException('Name cannot remain empty');
            FlashMessage::set('name', $name);

            $description = trim(htmlspecialchars($_POST['description']));
            if (empty($description))
                throw new ValidationException('Description cannot remain empty.');
            FlashMessage::set('description', $description);

            $tiposAceptados = ['image/png', 'image/jpg', 'image/jpeg'];
            $image = new File($tiposAceptados, 'image');

            $image->saveUploadFile(Asociado::RUTA_IMAGENES_ASOCIADOS);

            $partner = new Asociado($name, $image->getFileName(), $description);

            $partnerRepository = App::getRepository(AsociadoRepository::class);
            $partnerRepository->save($partner);

            $checkMessage = 'New partner added: ' . $partner->getName();
            App::get('logger')->add($checkMessage);

            FlashMessage::set('checkMessage', $checkMessage);

            FlashMessage::unset('name');
            FlashMessage::unset('description');
            FlashMessage::unset('checkMessage');

        } catch (ValidationException $validationException) {
            FlashMessage::set('partner-error', [$validationException->getMessage()]);
        } catch (FileException $fileException) {
            FlashMessage::set('partner-error', [$fileException->getMessage()]);
        }

        App::get('router')->redirect('partners');
    }
}