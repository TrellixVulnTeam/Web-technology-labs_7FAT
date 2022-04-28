<?php

namespace App\Services;

use App\Repository\UserRepository;

class LoginService
{
    public function __construct() {

    }

    public function validatePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errorArray = [];

            if (strlen($_POST['login']) > 49) $errorArray['error'][] = 'Слишком длинный логин';
            if (!is_null((new UserRepository())->findByLogin($_POST['login'])))
                $errorArray['error'][] = 'Такой пользователь существует';

            if (!empty($errorArray)) return $errorArray;
        }

        return null;
    }
}
