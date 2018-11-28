<?php

namespace App\Core;

use App\Controllers\AuthController;
use App\Models\MainModel;

class MainController
{
    protected $router;
    protected $userEmail;
    protected $model;
    protected $controller;
    protected $errorsArr = [];
    protected $isWrongCredentials = false;

    private function getPostfix()
    {
        return 'Controller';
    }

    public function __construct()
    {
        try {
            $this->router = new Router();
            $this->model = new MainModel();

            if ($_REQUEST['logout'] === 'true') {
                AuthService::logout();
            }

            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];

            if (!AuthService::isAuth()) {
                // регистрация
                if ($this->router->getRoutes()[1] === 'registry' && $email && $password) {
                    $response = $this->model->registerUser($email, $password);

                    if ($response['id']) {
                        $this->userEmail = $email;
                        AuthService::login($email);
                    } elseif ($response['error']) {
                        $this->errorsArr[] = $response['error'];
                    } else {
                        $this->errorsArr[] = 'Ошибка при регистрации пользователя';
                    }
                }

                // авторизация
                if (!AuthService::isAuth() && $email && $password && count($this->errorsArr) === 0) {
                    $user = $this->model->getUserByEmail($email, $password);

                    if ($user && password_verify($password, $user->password_hash)) {
                        $this->userEmail = $email;
                        AuthService::login($email);
                    } else {
                        $this->isWrongCredentials = true;
                    }
                }

                // если всё ещё не авторизованы - показываем форму авторизации
                if (!AuthService::isAuth()) {
                    $controller = new AuthController($this->router, null);
                    $controller->render([
                        'isWrongCredentials' => $this->isWrongCredentials,
                        'errors' => $this->errorsArr
                    ]);
                    return null;
                }
            } else {
                $this->userEmail = $email;
            }

            if (empty($this->router->getRoutes()[1])) {
                $className = 'Basic';
            } else {
                $className = ucfirst($this->router->getRoutes()[1]);
            }

            if (!in_array($className, ['User', 'File'])) {
                $className = 'User';
            }

            $className .= self::getPostfix();

            $finalClassName = '\\App\\Controllers\\' . $className;
            $this->controller = new $finalClassName($this->router, $this->userEmail);

            if (!$this->controller) {
                echo 'Не создан контроллер';
                return null;
            }

            if (empty($this->router->getRoutes()[2])) {
                $method = 'render404';
            } else {
                $method = strtolower($this->router->getRoutes()[2]);
            }

            if (method_exists($this->controller, $method)) {
                $this->controller->$method();
            } else {
                $this->controller->render404();
            }
        } catch (\PDOException $e) {
            echo 'Ошибка при работе с базой: '.$e->getMessage();
        } catch (\Exception $e) {
            echo 'Ошибка: '.$e->getMessage();
        }
    }
}
