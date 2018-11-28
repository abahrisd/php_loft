<?php

namespace App\Core;

class AuthService
{
    public static function login($email)
    {
        $_SESSION['auth'] = $email;
    }

    public static function logout()
    {
        $_SESSION['auth'] = null;
    }

    public static function isAuth()
    {
        return !empty($_SESSION['auth']);
    }
}
