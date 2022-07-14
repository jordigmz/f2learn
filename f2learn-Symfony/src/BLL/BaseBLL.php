<?php

namespace App\BLL;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class BaseBLL
{
    protected EntityManagerInterface $em;
    protected ValidatorInterface $validator;
    protected UserPasswordHasherInterface $encoder;
    protected TokenStorageInterface $tokenStorage;

    function __construct(EntityManagerInterface $em, ValidatorInterface $validator, UserPasswordHasherInterface $encoder, TokenStorageInterface $tokenStorage)
    {
        $this->em = $em;
        $this->validator = $validator;
        $this->encoder = $encoder;
        $this->tokenStorage = $tokenStorage;
    }

    private function validate($entity)
    {
        $errors = $this->validator->validate($entity);
        if (count($errors) > 0)
        {
            $strError = '';
            foreach($errors as $error)
            {
                if (!empty($strError))
                    $strError .= '\n';
                $strError .= $error->getMessage();
            }
            throw new BadRequestHttpException($strError);
        }
    }

    abstract public function toArray($entity);

    protected function guardaValidando($entity) : array
    {
        $this->validate($entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $this->toArray($entity);
    }

    public function entitiesToArray(array $entities): ?array
    {
        if (is_null($entities))
            return null;

        $arr = [];
        foreach ($entities as $entity)
            $arr[] = $this->toArray($entity);

        return $arr;
    }

    protected function getUser() : Users
    {
        return $this->tokenStorage->getToken()->getUser();
    }

    protected function checkRoleAdmin(): bool
    {
        $user = $this->getUser();

        if ($user->getRoles()[0] === 'ROLE_ADMIN') {
            return true;
        } else {
            return false;
        }
    }
}