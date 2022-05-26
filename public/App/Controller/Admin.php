<?php

namespace App\Controller;

use App\Assets\Admin\AdminView;
use App\Assets\Admin\LoginView;
use App\Assets\Authorization\UnauthorizedSuccessView;
use App\Assets\Authorization\UnauthorizedView;
use App\Repository\UserDataRepository;
use App\Repository\UserRepository;
use App\Services\LoginService;
use App\Services\SessionService;
use App\Services\UserService;
use Core\Controller;
use Core\JsonView;

class Admin extends Controller
{
    public function admin() {
        $userService = new UserService();
        $userDataRepository = new UserDataRepository();

        if ($userService->checkAuthorization()) {
            $view = new AdminView('Admin/Admin.php', $userDataRepository->findAll());

            return $view;
        }

        return $this->authenticationError();
    }

    public function signUp() {
        $userService = new UserService();
        $loginService = new LoginService();

        if ($userService->checkAuthorization()) {
            header('Location: http://127.0.0.1:80/admin');
            die();
        }

        if (!$userService->createUser()) {
            $data = $loginService->validatePassword();
            $view = new LoginView('Admin/Login.php', $data);

            return $view;
        }

        header('Location: http://127.0.0.1:80/admin');
        die();
    }

    public function signIn() {
        $userService = new UserService();
        $loginService = new LoginService();

        if ($userService->checkAuthorization()) {
            header('Location: http://127.0.0.1:80/admin');
            die();
        }

        if ($userService->authorizeUser()) {
            header('Location: http://127.0.0.1:80/admin');
            die();
        }

        $data = $loginService->validatePassword();
        $view = new LoginView('Admin/Login.php', $data);

        return $view;

    }

    public function unauthorize() {
        (new SessionService())->unsetUserSession();
        header('Location: http://127.0.0.1:80/signin');
        die();
    }

    public function authenticationError() {
        $view = new UnauthorizedView('Authorization/Unauthorized.php', null);

        return $view;
    }

    public function userExists() {
        $loginService = new LoginService();

        return (new JsonView($loginService->checkIfLoginExists()));
    }
}
