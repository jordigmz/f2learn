<?php

namespace App\Controller\API;

use App\BLL\UsersBLL;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UsersAPIController extends BaseAPIController
{
    /**
     * @Route("/auth/register.{_format}",
     *     name="api_register",
     *     requirements={"_format": "json"},
     *     defaults={"_format": "json"},
     *     methods={"POST"}
     * )
     */
    public function register(Request $request, UsersBLL $userBLL): JsonResponse
    {
        $data = $this->getContent($request);
        $user = $userBLL->nuevo($data['name'], $data['email'], $data['image'], $data['username'], $data['password']);

        return $this->getResponse($user, Response::HTTP_CREATED);
    }

    /**
     * @Route("/auth/login.{_format}",
     *     name="api_login",
     *     requirements={"_format": "json"},
     *     defaults={"_format": "json"},
     *     methods={"POST"}
     * )
     */
    public function login(Request $request)
    {
        throw new BadRequestHttpException("Login is captured by Bundle");
    }

    /**
     * @Route("/auth/login_check.{_format}",
     *     name="api_login_check",
     *     requirements={"_format": "json"},
     *     defaults={"_format": "json"},
     *     methods={"POST"}
     * )
     */
    public function login_check(Request $request)
    {
        throw new BadRequestHttpException("Login is captured by Bundle");
    }

    /**
     * @Route("/profile.{_format}",
     *     name="api_profile",
     *     requirements={"_format": "json"},
     *     defaults={"_format": "json"},
     *     methods={"GET"}
     * )
     */
    public function profile(UsersBLL $userBLL): JsonResponse
    {
        $user = $userBLL->profile();

        return $this->getResponse($user);
    }

    /**
     * @Route("/profile/new_password.{_format}",
     *     name="api_new_password",
     *     requirements={"_format": "json"},
     *     defaults={"_format": "json"},
     *     methods={"PATCH"})
     */
    public function cambiaPassword(Request $request, UsersBLL $userBLL)
    {
        $data = $this->getContent($request);
        if (is_null($data['password']) || !isset($data['password']) || empty($data['password']))
            throw new BadRequestHttpException('Password not received');

        $user = $userBLL->cambiaPassword($data['password']);

        return $this->getResponse($user);
    }
}