<?php

namespace f2learn\core;

use f2learn\app\exceptions\AppException;

class Security
{
    /**
     * @param string $role
     * @return bool
     * @throws AppException
     */
    public static function isUserGranted(string $role) : bool
    {
        if ($role === 'ROLE_ANONYMOUS')
            return true;

        $user = App::get('appUser');
        if (is_null($user))
            return false;

        $value_role = App::get('config')['security']['roles'][$role];
        $value_role_user = App::get('config')['security']['roles'][$user->getRole()];

        return ($value_role_user >= $value_role);
    }

    /**
     * @param string $password
     * @return string
     */
    public static function encrypt(string $password) : string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @param string $password
     * @param string $bdPassword
     * @return bool
     */
    public static function checkPassword(string $password, string $bdPassword) : bool
    {
        return password_verify($password, $bdPassword);
    }
}