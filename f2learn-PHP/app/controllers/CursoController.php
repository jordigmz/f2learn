<?php

namespace f2learn\app\controllers;

use f2learn\app\entity\Curso;
use f2learn\app\entity\Inscription;
use f2learn\app\exceptions\AppException;
use f2learn\app\exceptions\FileException;
use f2learn\app\exceptions\NotFoundException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\exceptions\ValidationException;
use f2learn\app\repository\AssessmentRepository;
use f2learn\app\repository\CursoRepository;
use f2learn\app\repository\InscriptionRepository;
use f2learn\app\repository\LanguageRepository;
use f2learn\app\repository\LevelRepository;
use f2learn\app\repository\UsuarioRepository;
use f2learn\app\utils\File;
use f2learn\core\App;
use f2learn\core\helpers\FlashMessage;
use f2learn\core\Response;

class CursoController
{
    /**
     * @throws AppException
     * @throws QueryException
     */
    public function courses() {
        $usuarioRepository = App::getRepository(UsuarioRepository::class);
        $usuarioActual = $usuarioRepository->find($_SESSION['loggedUser']);
        $usrActualImg = $usuarioActual->getUrlUsuario();

        $errors = FlashMessage::get('courses-error', []);
        $checkMessage = FlashMessage::get('checkMessage');

        $title = FlashMessage::get('title');
        $description = FlashMessage::get('description');
        $duration = FlashMessage::get('duration');
        $levelSelected = FlashMessage::get('levelSelected');
        $languageSelected = FlashMessage::get('languageSelected');
        $assessmentSelected = FlashMessage::get('assessmentSelected');
        $price = FlashMessage::get('price');

        $cursoRepository = App::getRepository(CursoRepository::class);
        $levelRepository = App::getRepository(LevelRepository::class);
        $languageRepository = App::getRepository(LanguageRepository::class);
        $assessmentRepository = App::getRepository(AssessmentRepository::class);

        $courses = $cursoRepository->findAll();
        $levels = $levelRepository->findAll();
        $languages = $languageRepository->findAll();
        $assessments = $assessmentRepository->findAll();

        Response::renderView('add-course', 'layout-admin', compact('courses', 'cursoRepository', 'levelRepository', 'languageRepository', 'assessmentRepository', 'usuarioRepository', 'levels', 'languages', 'assessments', 'errors', 'checkMessage', 'title', 'description', 'duration', 'levelSelected', 'languageSelected', 'assessmentSelected', 'price', 'usrActualImg'));
    }

    /**
     * @throws AppException
     * @throws NotFoundException
     * @throws QueryException
     */
    public function newCourse() {
        try {
            $title = trim(htmlspecialchars($_POST['title']));
            if (empty($title))
                throw new ValidationException('Title cannot remain empty');

            FlashMessage::set('title', $title);

            $description = trim(htmlspecialchars($_POST['description']));
            if (empty($description))
                throw new ValidationException('Description cannot remain empty');

            FlashMessage::set('description', $description);

            $duration = trim(htmlspecialchars($_POST['duration']));
            if (empty($duration))
                throw new ValidationException('Duration cannot remain empty');

            FlashMessage::set('duration', $duration);

            $level = trim(htmlspecialchars($_POST['level']));
            if (empty($level))
                throw new ValidationException('Level cannot remain empty');

            FlashMessage::set('levelSelected', $level);

            $language = trim(htmlspecialchars($_POST['language']));
            if (empty($language))
                throw new ValidationException('Language cannot remain empty');

            FlashMessage::set('languageSelected', $language);

            $assessments = (int)trim(htmlspecialchars($_POST['assessments']));
            if (empty($assessments))
                throw new ValidationException('Assessments cannot remain empty');

            FlashMessage::set('assessmentSelected', $assessments);

            $user = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
            $instructor = ucfirst($user->getName());

            FlashMessage::set('instructor', $instructor);

            $price = trim(htmlspecialchars($_POST['price']));
            if (empty($price))
                throw new ValidationException('Price cannot remain empty');

            FlashMessage::set('price', $price);

            $tiposAceptados = ['image/png', 'image/jpg', 'image/jpeg'];
            $image = new File($tiposAceptados, 'image');

            $image->saveUploadFile(Curso::RUTA_IMAGENES_CURSOS);

            $course = new Curso(
                $title,
                $image->getFileName(),
                $description,
                $duration,
                $level,
                $language,
                $assessments,
                $instructor,
                $price
            );

            $cursoRepository = App::getRepository(CursoRepository::class);
            $cursoRepository->save($course);

            $checkMessage = 'New course added: ' . $course->getTitle();
            App::get('logger')->add($checkMessage);

            FlashMessage::set('checkMessage', $checkMessage);

            FlashMessage::unset('title');
            FlashMessage::unset('description');
            FlashMessage::unset('duration');
            FlashMessage::unset('levelSelected');
            FlashMessage::unset('languageSelected');
            FlashMessage::unset('assessmentsSelected');
            FlashMessage::unset('instructor');
            FlashMessage::unset('price');
            FlashMessage::unset('checkMessage');

        } catch (FileException $fileException) {
            FlashMessage::set('courses-error', [$fileException->getMessage()]);
        } catch (ValidationException $validationException) {
            FlashMessage::set('courses-error', [$validationException->getMessage()]);
        }

        App::get('router')->redirect('courses');
    }

    /**
     * @throws AppException
     * @throws QueryException
     */
    public function ourCourses() {
        $courses = App::getRepository(CursoRepository::class)->findAll();

        Response::renderView('our-courses', 'layout', compact('courses'));
    }

    /**
     * @param $id
     * @throws AppException
     * @throws QueryException
     * @throws NotFoundException
     */
    public function show($id) {
        $cursoRepository = App::getRepository(CursoRepository::class);
        $course = $cursoRepository->find($id);

        $usuarioRepository = App::getRepository(UsuarioRepository::class);
        $instructor = $usuarioRepository->find($course->getInstructor());

        if (isset($_SESSION['loggedUser'])) {
            $usuarioActual = $usuarioRepository->find($_SESSION['loggedUser']);

            $enroll = ($usuarioActual->getRole() !== 'ROLE_ADMIN') || ($usuarioActual->getRole() === 'ROLE_ANONYMOUS') ? true : false;

            Response::renderView('course-details', 'layout', compact('course', 'cursoRepository', 'instructor', 'usuarioRepository', 'enroll'));
        } else {
            $enroll = false;
            Response::renderView('course-details', 'layout', compact('course', 'cursoRepository', 'instructor', 'usuarioRepository', 'enroll'));
        }
    }

    /**
     * @param $id
     * @throws AppException
     * @throws QueryException
     * @throws NotFoundException
     */
    public function enroll($id) {
        $usuarioActual = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $enroll = ($usuarioActual->getRole() !== 'ROLE_ADMIN') ? true : false;

        if ($enroll) {
            $cursoRepository = App::getRepository(CursoRepository::class);
            $course = $cursoRepository->find($id);

            $inscriptionRepository = App::getRepository(InscriptionRepository::class);
            $inscriptions = $inscriptionRepository->findBy(['student' => $usuarioActual->getId()]);

            $courses = [];
            $cursoRepository= App::getRepository(CursoRepository::class);

            foreach ($inscriptions as $inscription) {
                array_push($courses, $cursoRepository->find($inscription->getCourse()));
            }

            $courseExist = false;
            foreach ($courses as $course) {
                $courseId = $course->getId();
                if($courseId."" === $id) {
                    $courseExist = true;
                }
            }

            if (!$courseExist) {
                $inscription = new Inscription(
                    $usuarioActual->getId(),
                    $id
                );

                $inscriptionRepository->save($inscription);
                $cursoRepository->enrollCourse($course);

                $checkMessage = 'The student ' . $inscription->getStudent() . ' has enrolled in the course ' . $inscription->getCourse();
                App::get('logger')->add($checkMessage);

                App::get('router')->redirect('profile');
            } else {
                App::get('router')->redirect('courses/'. $id);
            }

        } else {
            App::get('router')->redirect('courses/'. $id);
        }
    }
}