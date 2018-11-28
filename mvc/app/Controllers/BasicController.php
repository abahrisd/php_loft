<?php

namespace App\Controllers;

use App\Core\MainView;

class BasicController
{
    protected $view;
    protected $router;
    protected $userEmail;
    protected $model;

    public function __construct($router, $email)
    {
        $this->router = $router;
        $this->userEmail = $email;
        $this->view = new MainView();
    }

    public function render404()
    {
        $this->view->render('404');
    }
}
