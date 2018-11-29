<?php

namespace App\Controllers;

use App\Models\FileModel;
use App\Models\UserModel;
use App\Config;

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

    public function list()
    {
        $sort = $_REQUEST['sort'] ?? 'asc';
        $allUsers = $this->model->getAllUsers($sort);
        $users = [];

        // конвертим класс в массив
        if ($allUsers) {
            $users = json_decode(json_encode($allUsers), true);
        }

        $this->view->render('users-list', ['users' => $users]);
    }

    public function edit()
    {
        if ($_REQUEST['user_id']) {
            // сохраняем картинку на сервер
            if (!empty($_FILES['user_photo']) && !empty($_FILES['user_photo']['tmp_name'])) {
                if (!is_dir(Config::$imagesAbsPath)) {
                    mkdir(Config::$imagesAbsPath);
                }

                $tmpName = $_FILES['user_photo']['tmp_name'];
                $fileName = $_FILES['user_photo']['name'].'_'.time();
                $fileSrc = Config::$imagesSrcPath.'\\'.$fileName;
                $filePath = Config::$imagesAbsPath.'\\'.$fileName;

                move_uploaded_file($tmpName, $filePath);

                // получаем пользователя что бы узнать его user_id
                $fileModel = new FileModel();
                $user = $this->model->getUserByEmail($this->userEmail);
                $photo_id = $fileModel->addPhoto($fileSrc, $user->user_id);
            }

            // если есть данные из формы - обновляем пользователя
            $params = [
                'user_id' => $_REQUEST['user_id'],
                'user_name' => $_REQUEST['user_name'],
                'user_age' => $_REQUEST['user_age'],
                'user_description' => $_REQUEST['user_description']
            ];

            if (!empty($photo_id)) {
                $params['photo_id'] = $photo_id;
            }

            $this->model->updateUserById($params);

            header("Location: ".$_SERVER['REDIRECT_URL'].'?salt='.time());
        }

        // получаем данные пользователя
        $user = $this->model->getUserByEmail($this->userEmail);
        $params = [];

        // конвертим класс в массив
        if ($user) {
            $params = json_decode(json_encode($user), true);
        }

        $this->view->render('user-edit', $params);
    }
}
