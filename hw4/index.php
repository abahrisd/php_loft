<?php

const BR = '<br>'.PHP_EOL;

use hw4\Tariffs\BasicTariff;
use hw4\Tariffs\DailyTariff;
use hw4\Tariffs\HourTariff;
use hw4\Tariffs\StudentTariff;

require_once "Traits/AddGPS.php";
require_once "Traits/AddDriver.php";
require_once "Tariffs/TariffInterface.php";

require_once "Tariffs/AbstractTariff.php";
require_once "Tariffs/BasicTariff.php";
require_once "Tariffs/DailyTariff.php";
require_once "Tariffs/HourTariff.php";
require_once "Tariffs/StudentTariff.php";

try {
    $basic = new BasicTariff(21, false, false);
    echo 'Базовый: '.$basic->getTotalPrice(56, 10).BR;

    $daily = new DailyTariff(21, true, true);
    echo 'Дневной: '.$daily->getTotalPrice(2560, 58).BR;

    $hour = new HourTariff(21, true, true);
    echo 'Почасовой: '.$hour->getTotalPrice(2560, 58).BR;

    $student = new StudentTariff(21, true, false);
    echo 'Студенческий: '.$student->getTotalPrice(2560, 58).BR;
} catch (Exception $e) {
    echo 'Ошибка: '.$e->getMessage();
}
