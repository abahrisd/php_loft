<?php

namespace App\Core;

class MainView
{
    public function render(String $filename, array $data = [])
    {
        extract($data);
        require_once __DIR__."/../Views/".$filename.".php";
        require_once __DIR__."/../Views/errors.php";
    }
}
