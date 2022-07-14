<?php

namespace f2learn\app\controllers;

use f2learn\app\entity\Mensaje;
use f2learn\app\exceptions\AppException;
use f2learn\app\exceptions\QueryException;
use f2learn\app\exceptions\ValidationException;
use f2learn\app\repository\MensajeRepository;
use f2learn\core\App;
use f2learn\core\helpers\FlashMessage;
use f2learn\core\Response;

class MensajeController
{
    /**
     * @throws AppException
     */
    public function contact() {
        $errors = FlashMessage::get('contact-error', []);
        $checkMessage = FlashMessage::get('checkMessage');

        $name = FlashMessage::get('name');
        $email = FlashMessage::get('email');
        $phone = FlashMessage::get('phone');
        $subject = FlashMessage::get('subject');
        $message = FlashMessage::get('message');

        Response::renderView('contact-us', 'layout', compact('errors', 'checkMessage', 'name', 'email', 'phone', 'subject', 'message'));
    }

    /**
     * @throws AppException
     * @throws QueryException
     */
    public function newMessage()
    {
        try {
            $name = trim(htmlspecialchars($_POST['name']));
            if (empty($name))
                throw new ValidationException("The name cannot remain empty.");
            FlashMessage::set('name', $name);

            $email = trim(htmlspecialchars($_POST['email']));
            if (empty($email))
                throw new ValidationException("The email cannot remain empty.");
            else {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
                    throw new ValidationException("The email is invalid.");
            }
            FlashMessage::set('email', $email);

            $phone = trim(htmlspecialchars($_POST['phone']));
            FlashMessage::set('phone', $phone);

            $subject = trim(htmlspecialchars($_POST['subject']));
            if (empty($subject))
                throw new ValidationException("The subject cannot remain empty.");
            FlashMessage::set('subject', $subject);

            $message = trim(htmlspecialchars($_POST['message']));
            if (empty($message))
                throw new ValidationException("The message cannot remain empty.");
            FlashMessage::set('message', $message);

            if (empty($errors)) {
                $contact = new Mensaje($name, $email, $phone, $subject, $message);

                App::getRepository(MensajeRepository::class)->save($contact);

                $checkMessage = "Successfully submitted with subject: $subject";
                App::get('logger')->add($checkMessage);

                FlashMessage::set('checkMessage', $checkMessage);

                $nameTo = $name;

                App::get('mailer')->send($subject, $email, $nameTo, $message);

                FlashMessage::unset('checkMessage');
            }

            FlashMessage::unset('name');
            FlashMessage::unset('email');
            FlashMessage::unset('phone');
            FlashMessage::unset('subject');
            FlashMessage::unset('message');

        } catch (ValidationException $validationException) {
            FlashMessage::set('contact-error', [$validationException->getMessage()]);
        }

        App::get('router')->redirect('contact');
    }
}