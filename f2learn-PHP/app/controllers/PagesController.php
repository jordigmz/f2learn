<?php
namespace f2learn\app\controllers;

use f2learn\app\exceptions\AppException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\repository\BlogRepository;
use f2learn\app\repository\CursoRepository;
use f2learn\app\utils\Utils;
use f2learn\core\App;
use f2learn\core\Response;

class PagesController
{
    /**
     * @throws AppException
     * @throws QueryException
     */
    public function index() {
        $cursoRepository = App::getRepository(CursoRepository::class);
        $courses = $cursoRepository->findAll();
        $courses = Utils::obtenerArrayReducido($courses, 6);

        $blogRepository = App::getRepository(BlogRepository::class);
        $blog = $blogRepository->findAll();
        $blog = Utils::obtenerArrayReducido($blog, 6);

        Response::renderView('index', 'layout', compact('blog', 'courses', 'cursoRepository'));
    }

    /**
     * @throws AppException
     */
    public function about() {
        Response::renderView('about-us', 'layout');
    }

    /**
     * @throws AppException
     */
    public function faqs() {
        Response::renderView('faqs', 'layout');
    }

    /**
     * @throws AppException
     */
    public function forgetPassword() {
        Response::renderView('forget-password', 'layout-simple');
    }

    /**
     * @throws AppException
     */
    public function membership() {
        Response::renderView('membership', 'layout');
    }
}