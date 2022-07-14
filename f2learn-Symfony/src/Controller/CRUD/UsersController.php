<?php

namespace App\Controller\CRUD;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users")
 */
class UsersController extends AbstractController
{
    /**
     * @Route("/", name="users", methods={"GET"})
     */
    public function users(UsersRepository $usersRepository): Response
    {
        $users = $usersRepository->findAll();

        return $this->render('views/users/users.html.twig', [
            'controller_name' => 'UsersController',
            'users' => $users
        ]);
    }

    /**
     * @Route("/{id}", name="users_delete", methods={"POST"})
     */
    public function delete(Request $request, Users $user, EntityManagerInterface $entityManager): Response
    {
        if(str_contains($this->getUser()->getRoles()[0], 'ADMIN')) {
            if ($this->getUser()->getUserIdentifier() !== $user->getUsername() && str_contains($user->getRoles()[0], 'USER')) {
                if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
                    $entityManager->remove($user);
                    $entityManager->flush();
                }
            }
        }

        return $this->redirectToRoute('users', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/grant/{id}", name="users_grant", methods={"GET", "POST"})
     */
    public function grant(Request $request, Users $user, EntityManagerInterface $entityManager): Response
    {
        if(str_contains($this->getUser()->getRoles()[0], 'ADMIN')) {
            if ($this->getUser()->getUserIdentifier() !== $user->getUsername() && str_contains($user->getRoles()[0], 'USER')) {
                $user->setRoles(["ROLE_ADMIN"]);

                $entityManager->flush();
            }
        }

        return $this->redirectToRoute('users', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/ungrant/{id}", name="users_ungrant", methods={"GET", "POST"})
     */
    public function ungrant(Request $request, Users $user, EntityManagerInterface $entityManager): Response
    {
        if(str_contains($this->getUser()->getRoles()[0], 'ADMIN')) {
            if ($this->getUser()->getUserIdentifier() !== $user->getUsername() && str_contains($user->getRoles()[0], 'ADMIN')) {
                $user->setRoles(["ROLE_USER"]);

                $entityManager->flush();
            }
        }

        return $this->redirectToRoute('users', [], Response::HTTP_SEE_OTHER);
    }
}
