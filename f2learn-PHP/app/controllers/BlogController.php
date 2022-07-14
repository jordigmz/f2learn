<?php

namespace f2learn\app\controllers;

use f2learn\app\entity\Post;
use f2learn\app\exceptions\AppException;
use f2learn\app\exceptions\FileException;
use f2learn\app\exceptions\NotFoundException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\exceptions\ValidationException;
use f2learn\app\repository\BlogRepository;
use f2learn\app\repository\UsuarioRepository;
use f2learn\app\utils\File;
use f2learn\core\App;
use f2learn\core\helpers\FlashMessage;
use f2learn\core\Response;

class BlogController
{
    /**
     * @throws AppException
     * @throws QueryException
     */
    public function blog() {
        $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $usrActualImg = $usuarioActual->getUrlUsuario();

        $errors = FlashMessage::get('blog-error', []);
        $checkMessage = FlashMessage::get('checkMessage');

        $title = FlashMessage::get('title');
        $description = FlashMessage::get('description');

        $blogRepository = App::getRepository(BlogRepository::class);
        $blog = $blogRepository->findAll();

        Response::renderView('blog-posts', 'layout-admin', compact('blog', 'errors', 'checkMessage', 'title', 'description', 'usrActualImg'));
    }

    /**
     * @throws AppException
     * @throws QueryException
     */
    public function post()
    {
        try {
            $title = trim(htmlspecialchars($_POST['title']));
            if (empty($title))
                throw new ValidationException('Title cannot remain empty');

            FlashMessage::set('title', $title);

            $description = trim(htmlspecialchars($_POST['description']));
            if (empty($description))
                throw new ValidationException('Description cannot remain empty');

            FlashMessage::set('description', $description);

            $tiposAceptados = ['image/png', 'image/jpg', 'image/jpeg'];
            $image = new File($tiposAceptados, 'image');

            $image->saveUploadFile(Post::RUTA_IMAGENES_BLOG);

            $post = new Post($image->getFileName(), $title, $description);

            $blogRepository = App::getRepository(BlogRepository::class);
            $blogRepository->save($post);

            $checkMessage = 'New post added: ' . $post->getTitle();
            App::get('logger')->add($checkMessage);

            FlashMessage::set('checkMessage', $checkMessage);

            FlashMessage::unset('title');
            FlashMessage::unset('description');
            FlashMessage::unset('checkMessage');

        } catch (ValidationException $validationException) {
            FlashMessage::set('blog-error', [$validationException->getMessage()]);
        } catch (FileException $fileException) {
            FlashMessage::set('blog-error', [$fileException->getMessage()]);
        }

        App::get('router')->redirect('posts');
    }

    /**
     * @throws AppException
     * @throws QueryException
     */
    public function blogPosts()
    {
        $blogRepository = App::getRepository(BlogRepository::class);

        $blog = $blogRepository->findAll();

        Response::renderView('blog', 'layout', compact('blog'));
    }

    /**
     * @param $id
     * @throws AppException
     * @throws QueryException
     * @throws NotFoundException
     */
    public function show($id)
    {
        $post = App::getRepository(BlogRepository::class)->find($id);

        Response::renderView('blog-details', 'layout', compact('post'));
    }
}