<?php

namespace App\Core;

class Router
{
    private $routes = [];
    private $urlParams = [];

    public function __construct()
    {
        $explodedUrl = explode('?', $_SERVER['REQUEST_URI']);
        $this->urlParams = $explodedUrl[1];
        $this->routes = explode('/', $explodedUrl[0]);
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}
