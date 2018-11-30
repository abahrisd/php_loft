<?php

require_once 'vendor/autoload.php';

$dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
$pdo = new PDO($dsn, 'root');

$users = $pdo->prepare('SELECT user_email, user_name, user_phone FROM users GROUP BY user_email');
$users->execute(['user_email' => $email]);
$usersData = $users->fetchAll(PDO::FETCH_OBJ);

$orders = $pdo->prepare('SELECT order_id, order_address, order_phone FROM orders');
$orders->execute();
$ordersData = $orders->fetchAll(PDO::FETCH_OBJ);

class View
{
    protected $loader;
    protected $twig;

    public function __construct($data = [])
    {
        $this->loader = new \Twig_Loader_Filesystem('views');
        $this->twig = new Twig_Environment($this->loader);
    }
    public function twigLoad(string $filename, array $data)
    {
        echo $this->twig->render($filename.".twig", $data);
    }
}

$view = new View();
$view->twigLoad('admin', ['usersData' => $usersData, 'ordersData' => $ordersData]);
