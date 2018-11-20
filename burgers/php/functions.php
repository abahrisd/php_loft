<?php

/**
 * Создаёт пользователя и возвращает его user_id
 * @param $data
 * @param $pdo
 */
function createUser($data, $pdo)
{
    if (!$data['email'] || !$pdo) {
        echo 'Не передан email или pdo';
        return false;
    }

    $requestCreateUser = $pdo->prepare('INSERT INTO users (user_email, user_name, user_phone) VALUES ( :user_email, :user_name, :user_phone )');

    if ($requestCreateUser->execute([
        'user_email' => $data['email'],
        'user_name' => $data['name'],
        'user_phone' => $data['phone']
        ]) === false
    ) {
        echo 'Ошибка при создании клиента';
        return false;
    }

    return getUserIdByEmail($data['email'], $pdo);
}

/**
 * Ищет пользователя по email и возвращает его. Возвращает false если не нашла пользователя.
 * @param $email
 * @param $pdo
 * @return bool
 */
function getUserIdByEmail($email, $pdo)
{
    if (!$email || !$pdo) {
        echo 'getUserIdByEmail: Не передан email или pdo';
        return false;
    }

    $requestGetUserIdEmail = $pdo->prepare('SELECT user_id FROM users where user_email = :user_email');
    $requestGetUserIdEmail->execute(['user_email' => $email]);
    $data = $requestGetUserIdEmail->fetchAll(PDO::FETCH_OBJ);

    if (count($data)) {
        return $data[0]->user_id;
    }

    return false;
}

/**
 * Добавляет заказ и возвращает его order_id
 * @param $orderData
 * @param $pdo
 * @return bool
 */
function placeOrder($orderData, $pdo)
{
    if (!$orderData['userId'] || !$pdo) {
        echo 'placeOrder: Не передан user_id или pdo';
        return false;
    }

    $placeOrder = $pdo->prepare('INSERT INTO orders (user_id, order_address, order_phone) VALUES ( :user_id, :order_address, :order_phone )');

    if ($placeOrder->execute([
            'user_id' => $orderData['userId'],
            'order_address' => $orderData['address'],
            'order_phone' => $orderData['phone']
        ]) === false
    ) {
        echo 'Ошибка при создании заказана';
        return false;
    }

    return $pdo->lastInsertId();
}

/**
 * Создаёт файл с сообщением
 * @param $messageData
 * @param $pdo
 */
function sendMessage($messageData, $pdo)
{
    if (!$messageData['userId'] || !$pdo) {
        echo 'sendMessage: Не передан user_id или pdo';
        return;
    }

    $requestOrdersCount = $pdo->prepare('SELECT count(*) as cnt FROM orders where user_id = :user_id');
    $requestOrdersCount->execute(['user_id' => $messageData['userId']]);
    $data = $requestOrdersCount->fetchAll(PDO::FETCH_OBJ);

    $count = $data[0]->cnt;
    $thxText = $count == 1 ? 'Спасибо - это ваш первый заказ.' : 'Спасибо! Это уже '.$count.' заказ';

    $message = '<h2>Заказ №'.$messageData['orderId'].'</h2><div>Ваш заказ будет доставлен по адресу '.$messageData['address'].'</div><div>Содержмое заказа - DarkBeefBurger за 500 рублей, 1 шт</div><div>'.$thxText.'</div>';
    $fileName = 'order_'.date('d-m-YTH-i-s').'.html';

    if (!is_dir('../messages')) {
        mkdir('../messages');
    }

    file_put_contents('../messages/'.$fileName, $message);
}
