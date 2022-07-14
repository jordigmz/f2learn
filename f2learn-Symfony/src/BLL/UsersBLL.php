<?php

namespace App\BLL;

use App\Entity\Users;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersBLL extends BaseBLL
{
    public function nuevo(string $name, string $email, string $image, string $username, string $password): array
    {
        $user = new Users();

        $user->setName($name);
        $user->setEmail($email);
        $user->setImage($image);
        $user->setUsername($username);
        $user->setPassword($this->encoder->hashPassword($user, $password));
        $user->setRoles(["ROLE_USER"]);
        $user->setIsVerified(true);

        return $this->guardaValidando($user);
    }

    public function profile(): ?array
    {
        $user = $this->getUser();
        return $this->toArray($user);
    }

    public function cambiaPassword(string $newPassword): array
    {
        $user = $this->getUser();
        $user->setPassword($this->encoder->hashPassword($user, $newPassword));

        return $this->guardaValidando($user);
    }

    public function toArray($user): array
    {
        if (is_null($user))
            throw new \Exception("User does not exist");

        if (!($user instanceof Users))
            throw new \Exception("The entity is not a Users");

        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'image' => $user->getImage(),
            'username' => $user->getUsername(),
            'roles' => $user->getRoles(),
            'is_verified' => $user->isVerified()
        ];
    }
}