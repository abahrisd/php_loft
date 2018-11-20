<?php

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>';

$dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
$pdo = new PDO($dsn, 'root');

$users = $pdo->prepare('SELECT user_email, user_name, user_phone FROM users GROUP BY user_email');
$users->execute(['user_email' => $email]);
$usersData = $users->fetchAll(PDO::FETCH_OBJ);

$orders = $pdo->prepare('SELECT order_id, order_address, order_phone FROM orders');
$orders->execute();
$ordersData = $orders->fetchAll(PDO::FETCH_OBJ);

//var_dump($data);
echo '<h2>Пользователи</h2>';
echo '<table>
    <tr>
        <th>Email</th>
        <th>Имя</th>
        <th>Телефон</th>
    </tr>';

foreach ($usersData as $key => $value) {
    echo '<tr>
        <td>'.$value->user_email.'</td>
        <td>'.$value->user_name.'</td>
        <td>'.$value->user_phone.'</td>
    </tr>';
}

echo '</table>';
echo '<h2>Заказы</h2>';
echo '<table>
    <tr>
        <th>Order_id</th>
        <th>Адрес</th>
        <th>Телефон</th>
    </tr>';

foreach ($ordersData as $key2 => $value2) {
    echo '<tr>
        <td>'.$value2->order_id.'</td>
        <td>'.$value2->order_address.'</td>
        <td>'.$value2->order_phone.'</td>
    </tr>';
}
echo '</table>';

echo '</body>
</html>';