<?php

const BR = '<br>';
const ITEM_NAME_MAP = [
    'ProductName' => 'Наименование позиции',
    'Quantity' => 'Количество',
    'USPrice' => 'Цена (USD)',
    'Comment' => 'Комментарий',
    'ShipDate' => 'Дата доставки',
];

function task1()
{
    $file = file_get_contents('data.xml');
    $xml = new SimpleXMLElement($file);
    $counter = 1;

    echo 'Данные заказа'.BR;

    echo '<ul>';
    echo 'Номер заказа: '.$xml->attributes()->PurchaseOrderNumber->__toString().BR;
    echo 'Дата заказа: '.$xml->attributes()->PurchaseOrderNumber->__toString().BR;
    echo '</ul>';

    foreach ($xml->Address as $address) {
        if ((string) $address['Type'] == 'Shipping') {
            echo 'Адрес доставки:'.BR;
        } elseif ((string) $address['Type'] == 'Billing') {
            echo 'Платежный адрес:'.BR;
        }

        echo '<ul>';
        echo 'Имя: '.$address->Name->__toString().BR;
        echo 'Улица: '.$address->Street->__toString().BR;
        echo 'Город: '.$address->City->__toString().BR;
        echo 'Штат: '.$address->State->__toString().BR;
        echo 'Индекс: '.$address->Zip->__toString().BR;
        echo 'Страна: '.$address->Country->__toString().BR;
        echo '</ul>';
    }

    echo 'Примечание к доставке: '.$xml->DeliveryNotes->__toString().BR.BR;
    echo 'Детали заказа'.BR;

    echo '<ul>';
    foreach ($xml->Items->Item as $item) {
        echo '<li>Позиция '.$counter++;
        echo '<ul>';
        echo 'Партномер: '.$item->attributes()->PartNumber->__toString().BR;
        foreach ($item as $key => $value) {
            echo ITEM_NAME_MAP[$key].': '.$value.BR;
        }
        echo '</ul></li>';
    }
    echo '</ul>';
}

function task2_1()
{
    $arr = [
        'funnyNumbers' => [1, 2, 3, 4, 5, 6],
        'averageNumbers' => [3, 4, 7, 8, 9, 0],
    ];

    $encoded = json_encode($arr, JSON_UNESCAPED_UNICODE);
    file_put_contents('output.json', $encoded);
}

function task2_2()
{
    $data = file_get_contents('output.json');
    $decoded = json_decode($data, true);
    foreach ($decoded as $key => $value) {
        foreach ($value as $key1 => $value1) {
            if (rand(0, 100) > 50) {
                $decoded[$key][$key1]++;
            }
        }
    }

    $encoded = json_encode($decoded, JSON_UNESCAPED_UNICODE);
    file_put_contents('output2.json', $encoded);
}

function task2_3()
{
    $data = json_decode(file_get_contents('output.json'), true);
    $data2 = json_decode(file_get_contents('output2.json'), true);

    echo 'Разница для output и output2:'.BR;
    foreach ($data as $key => $value) {
        echo $key.BR;
        $notSecond = [];
        $notFirst = [];

        foreach ($data[$key] as $key1 => $value1) {
            if (!in_array($value1, $data2[$key])) {
                $notSecond[] = $value1;
            }
        }

        foreach ($data2[$key] as $key2 => $value2) {
            if (!in_array($value2, $data[$key])) {
                $notFirst[] = $value2;
            }
        }

        if (count($notSecond)) {
            echo 'Присутствуют в первом файле, но отсутствует во втором: '.join($notSecond, ', ').BR;
        }

        if (count($notFirst)) {
            echo 'Присутствуют во втором файле, но отсутствует в первом: '.join($notFirst, ', ').BR;
        }

        if (!count($notSecond) && !count($notFirst)) {
            echo 'Нет разницы'.BR;
        }
    }
}

function task3_1()
{
    $arr = [];
    for ($i = 0; $i < 50; $i++) {
        $arr[] = rand(1, 100);
    }

    $fp = fopen('./task3.csv', 'w');
    fputcsv($fp, $arr, ';');
    fclose($fp);
}

function task3_2()
{

    function evenSum($acc, $item)
    {
        if (intval($item) % 2 === 0) {
            $acc += intval($item);
        }
        return $acc;
    }

    $csvPath = './task3.csv';
    $csvFile = fopen($csvPath, "r");
    if ($csvFile) {
        $res = [];
        while (($csvData = fgetcsv($csvFile, 100, ";")) !== false) {
            $res[] = $csvData;
        }
        echo 'Сумма чётных чисел из файла taske.csv: '.array_reduce($res[0], "evenSum").BR;
    }
}

function task4()
{
    $file = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
    $decoded = json_decode($file, true);
    foreach ($decoded['query']['pages'] as $key => $value) {
        echo 'Title: '.$value['title'].BR;
        echo 'Page id: '.$value['pageid'].BR;
    }
}
