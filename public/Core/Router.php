<?php

namespace Core;

class Router
{
    private static array $controllers = [];

    public static function route(string $path, string $controllerName, string $methodName) {
        if (Router::$controllers === null) {
            Router::$controllers = [];
        }

        Router::$controllers[$path] = ['controllerName' => $controllerName, 'methodName' => $methodName];
    }

    public static function applicationMountPoint() {
        $requestedRoutes = explode('/', $_SERVER['REQUEST_URI']);

        if (array_key_exists('/'.$requestedRoutes[1], Router::$controllers)) {

            $controllerName = Router::$controllers['/'.$requestedRoutes[1]]['controllerName'];
            $controller = new $controllerName;

            $methodName = Router::$controllers['/'.$requestedRoutes[1]]['methodName'];
            if (method_exists($controller, $methodName)) {
                echo $controller->$methodName()->getView();
            }
            else {
                echo 'error? But where?';
            }
            //$controller->Router::$controllers['/'.$requestedRoutes[2]]();
        }
        else {
            //Router::page404();
        }
    }

    public static function redirect(string $src, string $dest)
    {
        if ($_SERVER['REQUEST_URI'] === $src) {
            header('Location: '.$dest);
            die();
        }
    }

    private static function page404(array $toPrint = null)
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');

        echo 'Страница 404';

        if ($toPrint !== null) {
            foreach ($toPrint as $additionalInfo) {
                echo $additionalInfo . ' ';
            }
        }
    }
}
