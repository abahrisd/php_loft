<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BasicController
{
    public function __construct($router, $email)
    {
        parent::__construct($router, $email);
        $this->model = new UserModel();
    }

    public function images()
    {
        $this->view->render('images');
    }

    public function edit()
    {
        var_dump('user edit $_REQUEST', $_REQUEST);
        // если в request есть данные - пишем их в базу
        //
        //достаём из базы данные пользователя по id
        //показываем их на форме

        $user = $this->model->getUserByEmail($this->userEmail);
        $params = [];

        if ($user) {
            $params = json_decode(json_encode($user), true);
        }

        // получаем данные пользователя

        $this->view->render('user-edit', $params);
    }
}
