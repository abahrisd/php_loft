<?php

namespace App\Core;

use App\Controllers\AuthController;

class MainController
{
    protected $routes;
    protected $controller;
    protected $auth;
    private const POSTFIX = "Controller";

    private function getPostfix()
    {
        return 'Controller';
    }

    public function __construct()
    {
        $this->routes = explode('/', $_SERVER['REQUEST_URI']);
        $this->auth = new AuthService(); // TODO проверка авторизации
    }

    public function createController()
    {
        if (!isset($_COOKIE[self::AUTH_COOKIE])) {
            // TODO показать форму авторизации

            $controller = new AuthController();
            $controller->render();

//            setcookie(self::AUTH_COOKIE, true, time() + (86400 * 30), "/"); // 86400 = 1 day
//            echo "Cookie named '" . self::AUTH_COOKIE . "' is not set!";
            return null;
        }

        if (empty($this->routes[1])) {
            $className = 'Basic';
        } else {
            $className = ucfirst($this->routes[1]);
        }

        $className .= self::POSTFIX;

        $finalClassName = '\\App\\Controllers\\'.$className;
        $this->controller = new $finalClassName;
        $this->main();
    }

    public function main()
    {
        if (!$this->controller) {
            echo 'Не создан контроллер';
            return;
        }

        if (empty($this->routes[2])) {
            $method = 'index';
        } else {
            $method = strtolower($this->routes[2]);
        }

        if (method_exists($this->controller, $method)) {
            $this->controller->$method();
        } else {
            $this->controller->emptyMethod($method);
        }
    }
}
