<?php

namespace App\Controllers;

class UserController extends BasicController
{
    public function images()
    {
        $this->view->render('images');
    }
}
