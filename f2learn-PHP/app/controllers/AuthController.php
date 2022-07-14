<?php

namespace f2learn\app\controllers;

use f2learn\app\entity\Usuario;
use f2learn\app\exceptions\FileException;
use f2learn\app\exceptions\NotFoundException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\exceptions\ValidationException;
use f2learn\app\exceptions\AppException;
use f2learn\app\repository\CursoRepository;
use f2learn\app\repository\InscriptionRepository;
use f2learn\app\repository\UsuarioRepository;
use f2learn\app\utils\File;
use f2learn\core\App;
use f2learn\core\helpers\FlashMessage;
use f2learn\core\Response;
use f2learn\core\Security;

class AuthController
{
    /**
     * @throws AppException
     */
    public function login()
    {
        if (Security::isUserGranted('ROLE_USER') || Security::isUserGranted('ROLE_ADMIN')) {
            App::get('router')->redirect('profile');
        } else {
            $errors = FlashMessage::get('login-error', []);
            $username = FlashMessage::get('username');

            Response::renderView('login', 'layout-simple', compact('errors', 'username'));
        }
    }

    /**
     * @return void
     * @throws AppException
     * @throws QueryException
     */
    public function checkLogin()
    {
        try {
            if (!isset($_POST['username']) || empty($_POST['username']))
                throw new ValidationException('You must enter your username and password.');

            FlashMessage::set('username', $_POST['username']);

            if(!isset($_POST['password']) || empty($_POST['password']))
                throw new ValidationException('You must enter your username and password.');

            $user = App::getRepository(UsuarioRepository::class)->findOneBy([
                'username' => $_POST['username']
            ]);

            if (!is_null($user) && Security::checkPassword($_POST['password'], $user->getPassword())) {
                $_SESSION['loggedUser'] = $user->getId();

                FlashMessage::unset('username');

                App::get('router')->redirect('');
            }

            throw new ValidationException('User and password entered do not exist');
        } catch (ValidationException $validationException) {
            FlashMessage::set('login-error', [$validationException->getMessage()]);

            App::get('router')->redirect('login');
        }
    }

    /**
     * @throws AppException
     */
    public function logout()
    {
        if (isset($_SESSION['loggedUser'])) {
            $_SESSION['loggedUser'] = null;
            unset($_SESSION['loggedUser']);
        }

        App::get('router')->redirect('login');
    }

    /**
     * @throws AppException
     */
    public function register()
    {
        $errors = FlashMessage::get('register-error', []);
        $name = FlashMessage::get('name');
        $email = FlashMessage::get('email');
        $username = FlashMessage::get('username');

        Response::renderView('register', 'layout-simple', compact('errors', 'username', 'name', 'email'));
    }

    /**
     * @throws AppException
     * @throws QueryException
     */
    public function checkRegister()
    {
        try {
            $name = trim(htmlspecialchars($_POST['name']));
            if (empty($name))
                throw new ValidationException('Name cannot remain empty');
            FlashMessage::set('name', $name);

            $email = trim(htmlspecialchars($_POST['email']));
            if (empty($email))
                throw new ValidationException("The email cannot remain empty.");
            else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
                    throw new ValidationException("The email is invalid.");
            }
            FlashMessage::set('email', $email);

            $emailValid = App::getRepository(UsuarioRepository::class)->findOneBy([
                'email' => $_POST['email']
            ]);

            if(!is_null($emailValid))
                throw new ValidationException('An user already exist with this email.');

            $avatar = 'guest.jpg';
            if ($_FILES['image']['name'] !== "") {
                $tiposAceptados = ['image/png', 'image/jpg', 'image/jpeg'];
                $image = new File($tiposAceptados, 'image');

                $image->saveUploadFile(Usuario::RUTA_IMAGENES_USUARIOS);

                $avatar = $image->getFileName();
            }

            $username = trim(htmlspecialchars($_POST['username']));
            if (empty($username))
                throw new ValidationException('Username cannot remain empty.');
            FlashMessage::set('username', $username);

            $userValid = App::getRepository(UsuarioRepository::class)->findOneBy([
                'username' => $_POST['username']
            ]);

            if(!is_null($userValid))
                throw new ValidationException('User already exist.');

            $password = trim(htmlspecialchars($_POST['password']));
            if(empty($password))
                throw new ValidationException('The password fields cannot remain empty.');

            $rePassword = trim(htmlspecialchars($_POST['re-password']));
            if(empty($rePassword) || $password !== $rePassword)
                throw new ValidationException('The passwords must match.');

            $password = Security::encrypt($password);

            $captcha = trim(htmlspecialchars($_POST['captcha']));
            if (empty($captcha))
                throw new ValidationException('Captcha cannot remain empty');

            if ($captcha !== $_SESSION['captcha']) {
                throw new ValidationException('Invalid captcha.');
            }

            $user = new Usuario();
            $user->setName($name);
            $user->setEmail($email);
            $user->setImage($avatar);
            $user->setUsername($username);
            $user->setRole('ROLE_USER');
            $user->setPassword($password);

            $usuarioRepository = App::getRepository(UsuarioRepository::class);
            $usuarioRepository->save($user);

            $checkMessage = 'New user added: ' . $user->getName();
            App::get('logger')->add($checkMessage);

            FlashMessage::set('checkMessage', $checkMessage);

            FlashMessage::unset('name');
            FlashMessage::unset('email');
            FlashMessage::unset('checkMessage');

            $user = App::getRepository(UsuarioRepository::class)->findOneBy([
                'username' => $username
            ]);

            $_SESSION['loggedUser'] = $user->getId();

            FlashMessage::unset('username');

            App::get('router')->redirect('profile');
        } catch (ValidationException $validationException) {
            FlashMessage::set('register-error', [ $validationException->getMessage() ]);

            App::get('router')->redirect('register');
        } catch (FileException $fileException) {
            FlashMessage::set('partner-error', [$fileException->getMessage()]);

            App::get('router')->redirect('register');
        }
    }

    /**
     * @throws AppException
     */
    public function profile() {
        $user = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
        $usrActualImg = $user->getUrlUsuario();

        $inscriptionRepository = App::getRepository(InscriptionRepository::class);
        $inscriptions = $inscriptionRepository->findBy(['student' => $user->getId()]);

        $courses = [];
        $cursoRepository= App::getRepository(CursoRepository::class);

        foreach ($inscriptions as $inscription) {
            array_push($courses, $cursoRepository->find($inscription->getCourse()));
        }

        $errors = FlashMessage::get('edit-error', []);
        $email = FlashMessage::get('name');
        $name = FlashMessage::get('email');
        $username = FlashMessage::get('username');

        Response::renderView('profile', 'layout', compact('user', 'errors', 'username', 'name', 'email', 'usrActualImg', 'courses', 'cursoRepository'));
    }

    public function editProfile()
    {
        try {
            $user = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);

            $name = trim(htmlspecialchars($_POST['name']));
            if (empty($name))
                throw new ValidationException('Name cannot remain empty');
            FlashMessage::set('name', $name);

            $email = trim(htmlspecialchars($_POST['email']));
            if (empty($email))
                throw new ValidationException("The email cannot remain empty.");
            else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
                    throw new ValidationException("The email is invalid.");
            }
            FlashMessage::set('email', $email);

            if ($_FILES['image']['name'] !== "") {
                $tiposAceptados = ['image/png', 'image/jpg', 'image/jpeg'];
                $image = new File($tiposAceptados, 'image');

                $image->saveUploadFile(Usuario::RUTA_IMAGENES_USUARIOS);

                $user->setImage($image->getFileName());
            }

            $username = trim(htmlspecialchars($_POST['username']));
            if (empty($username))
                throw new ValidationException('Username cannot remain empty.');
            FlashMessage::set('username', $username);

            $user->setName($name);
            $user->setEmail($email);
            $user->setUsername($username);

            $usuarioRepository = App::getRepository(UsuarioRepository::class);
            $usuarioRepository->update($user);

            $checkMessage = 'User edited: ' . $user->getName();
            App::get('logger')->add($checkMessage);

            FlashMessage::set('checkMessage', $checkMessage);

            FlashMessage::unset('name');
            FlashMessage::unset('email');
            FlashMessage::unset('username');
            FlashMessage::unset('checkMessage');

            App::get('router')->redirect('profile');
        } catch (ValidationException $validationException) {
            FlashMessage::set('edit-error', [$validationException->getMessage()]);

            App::get('router')->redirect('profile');
        } catch (FileException $fileException) {
            FlashMessage::set('edit-error', [$fileException->getMessage()]);
        }
    }

    public function newPassword()
    {
        try {
            $newPassword = trim(htmlspecialchars($_POST['new-password']));
            if(empty($newPassword))
                throw new ValidationException('The password fields cannot remain empty.');

            $reNewPassword = trim(htmlspecialchars($_POST['re-new-password']));
            if(empty($reNewPassword) || $newPassword !== $reNewPassword)
                throw new ValidationException('The passwords must match.');

            $newPassword = Security::encrypt($newPassword);

            $user = App::getRepository(UsuarioRepository::class)->find($_SESSION['loggedUser']);
            $user->setPassword($newPassword);

            $usuarioRepository = App::getRepository(UsuarioRepository::class);
            $usuarioRepository->update($user);

            $checkMessage = 'User edited: ' . $user->getName();
            App::get('logger')->add($checkMessage);

            FlashMessage::set('checkMessage', $checkMessage);

            FlashMessage::unset('name');
            FlashMessage::unset('email');
            FlashMessage::unset('username');
            FlashMessage::unset('checkMessage');

            App::get('router')->redirect('profile');
        } catch (ValidationException $validationException) {
            FlashMessage::set('edit-error', [$validationException->getMessage()]);

            App::get('router')->redirect('profile');
        }
    }

    public function users() {
        $usuarioRepository = App::getRepository(UsuarioRepository::class);

        $user = $usuarioRepository->find($_SESSION['loggedUser']);
        $usrActualImg = $user->getUrlUsuario();

        $allUsers = $usuarioRepository->findAll();

        $users = [];

        foreach ($allUsers as $usr) {
            if ($usr->getId() !== $user->getId()) {
                array_push($users, $usr);
            }
        }

        Response::renderView('users', 'layout-admin', compact('user', 'usrActualImg', 'users'));
    }

    public function grant($id)
    {
        $usuarioRepository = App::getRepository(UsuarioRepository::class);
        $userLogged = $usuarioRepository->find($_SESSION['loggedUser']);

        if ($userLogged->getRole() === 'ROLE_ADMIN') {
            $user = $usuarioRepository->find($id);
            if($user->getRole() !== 'ROLE_ADMIN') {
                $user->setRole('ROLE_ADMIN');

                $usuarioRepository->update($user);

                $checkMessage = 'User ' . $user->getName() . ' granted to: ' . $user->getRole();
                App::get('logger')->add($checkMessage);
            }
        }
        App::get('router')->redirect('users');
    }

    public function ungrant($id)
    {
        $usuarioRepository = App::getRepository(UsuarioRepository::class);
        $userLogged = $usuarioRepository->find($_SESSION['loggedUser']);

        if ($userLogged->getRole() === 'ROLE_ADMIN') {
            $user = $usuarioRepository->find($id);
            if($user->getRole() === 'ROLE_ADMIN') {
                $user->setRole('ROLE_USER');

                $usuarioRepository->update($user);

                $checkMessage = 'User ' . $user->getName() . ' ungranted to: ' . $user->getRole();
                App::get('logger')->add($checkMessage);
            }
        }
        App::get('router')->redirect('users');
    }

    /**
     * @param $id
     * @return void
     * @throws AppException
     * @throws NotFoundException
     */
    public function delete($id)
    {
        try {
            $usuarioRepository = App::getRepository(UsuarioRepository::class);
            $userLogged = $usuarioRepository->find($_SESSION['loggedUser']);

            if ($userLogged->getRole() === 'ROLE_ADMIN') {
                $user = $usuarioRepository->find($id);
                if($user->getRole() === 'ROLE_ADMIN')
                    throw new ValidationException('Forbidden action, privileges required.');

                $checkMessage = 'User deleted: ' . $user->getName();
                App::get('logger')->add($checkMessage);

                $usuarioRepository->delete($id);
            }
            App::get('router')->redirect('users');
        } catch (ValidationException $validationException) {
            FlashMessage::set('user-error', [$validationException->getMessage()]);

            App::get('router')->redirect('users');
        }
    }
}