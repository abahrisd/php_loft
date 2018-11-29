<?php

namespace App\Controllers;

use App\Models\FileModel;

class FileController extends BasicController
{

    public function __construct($router, $email)
    {
        parent::__construct($router, $email);
        $this->model = new FileModel();
    }

    public function list()
    {
        $userFiles = $this->model->getUserFiles($this->userEmail);

        // конвертим класс в массив
        if ($userFiles) {
            $userFiles = json_decode(json_encode($userFiles), true);
        }

        $this->view->render('files-list', ['userFiles' => $userFiles, 'user_email' => $this->userEmail]);
    }
}
