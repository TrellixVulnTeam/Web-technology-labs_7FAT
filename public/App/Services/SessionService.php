<?php

namespace App\Services;

use App\Entity\User;

class SessionService
{
    public function setUserSession() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //session_start();

            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['user_role'] = "admin";

            return true;
        }

        return false;
    }

    public function unsetUserSession() {
        session_destroy();
    }
}
