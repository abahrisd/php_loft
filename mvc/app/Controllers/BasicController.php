<?php

namespace App\Controllers;

use App\Core\MainView;

class BasicController
{
    protected $view;
    protected $router;
    protected $model;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = new MainView();
    }

    public function render404()
    {
        $this->view->render('404');
    }
}
