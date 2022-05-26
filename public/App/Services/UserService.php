<?php

namespace App\Services;

use App\Entity\User;
use App\Repository\UserRepository;

class UserService
{
    public function checkAuthorization(User $user = null) {
        if ($user == null) {
            $userRepository = new UserRepository();
            $userEntity = $userRepository->findByLogin($_SESSION['login']);

            if (is_null($userEntity)) return false;
            $user = $userEntity;
        }

        if ($user->getLogin() == $_SESSION['login'] &&
            $user->getPassword() == password_verify($_SESSION['password'], $user->getPassword()))
        {
            return true;
        }
        return false;
    }

    public function authorizeUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userRepository = new UserRepository();
            $user = $userRepository->findByLogin($_POST['login']);

            if (is_null($user)) return false;

            if (password_verify($_POST['password'], $user->getPassword())) {
                $sessionService = new SessionService();
                $sessionService->setUserSession();
                return true;
            }
        }

        return false;
    }

    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loginService = new LoginService();

            if (!is_null($loginService->validatePassword()))
                return false;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();

            $user->setLogin($_POST['login']);
            $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));

            $userRepository = new UserRepository();
            $userRepository->save($user);
            $userRepository->exec();

            $sessionService = new SessionService();
            $sessionService->setUserSession();

            return true;
        }

        return false;
    }
}
