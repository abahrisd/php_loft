<?php

namespace App\Controllers;

class AuthController extends BasicController
{
    public function render($params)
    {
        if ($this->router->getRoutes()[1] === 'registry') {
            $this->view->render('registry', $params);
        } else {
            $this->view->render('login', $params);
        }
    }
}
