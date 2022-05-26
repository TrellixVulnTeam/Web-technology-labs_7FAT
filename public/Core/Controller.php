<?php

namespace Core;

use App\Services\UserDataService;

class Controller
{
    public function __construct() {
        session_start();
        UserDataService::saveUserData();
    }
    /*public function __construct() {

    }

    protected array $urlController;

    public function wireUrlWithController($link, $functionName) {
        if (!isset($this->urlController)) {
            $this->urlController = [];
        }

        $this->urlController[$link] = $functionName;
    }

    public function callController($url) {
        $methodName = $this->urlController[$url];
        return $this->$methodName();
    }*/
}
