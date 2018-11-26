<?php

namespace App\Core;

class AuthService
{
    public function login($email)
    {
        $_SESSION['auth'] = $email;
    }

    public function logout()
    {
        $_SESSION['auth'] = null;
    }

    public function isAuth()
    {
        return !empty($_SESSION['auth']);
    }
}