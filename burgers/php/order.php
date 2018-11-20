<?php
require_once('functions.php');

const NOT_SET = 'не указан';

try {

    $dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
    $pdo = new PDO($dsn, 'root');
    $email = $_REQUEST['email'];
    $userId = getUserIdByEmail($email, $pdo);

    if (empty($userId)) {
        $data = [
            'email' => $email,
            'name' => $_REQUEST['name'],
            'phone' => $_REQUEST['phone']
        ];
        $userId = createUser($data, $pdo);
    }

    if (empty($userId)) {
        echo 'Не удалось определить пользователя';
        return;
    }

    $street = !empty($_REQUEST['street']) ? $_REQUEST['street'] : NOT_SET.'а';
    $building = !empty($_REQUEST['home']) ? $_REQUEST['home'] : NOT_SET;
    $part = !empty($_REQUEST['part']) ? $_REQUEST['part'] : NOT_SET; // корпус
    $floor = !empty($_REQUEST['floor']) ? $_REQUEST['floor'] : NOT_SET; // этаж
    $appt = !empty($_REQUEST['appt']) ? $_REQUEST['appt'] : NOT_SET.'а'; // квартира
    $isCashback = $_REQUEST['isCashback'];
    $isPaymentWithCard = $_REQUEST['isPaymentWithCard'];
    $callback = $_REQUEST['callback'];
    $address = 'Улица '.$street.', дом '.$building.', корпус '.$part.', этаж '.$floor.', квартира '.$appt.'.';

    if ($isCashback === 'on') {
        $address .= ' Потребуется сдача.';
    }
    if ($isPaymentWithCard === 'on') {
        $address .= ' Оплата картой.';
    }
    if ($callback === 'on') {
        $address .= ' Не перезванивать.';
    }

    $orderDetails = [
        'userId' => $userId,
        'address' => $address,
        'phone' => $_REQUEST['phone'],
    ];

    $orderId = placeOrder($orderDetails, $pdo);
    if ($orderId) {
        $messageData = [
            'orderId' => $orderId,
            'userId' => $userId,
            'address' => $address,
        ];

        sendMessage($messageData, $pdo);
    };
} catch (PDOException $e) {
    echo $e->getMessage();
}