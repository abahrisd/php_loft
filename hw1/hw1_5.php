<?php
$bmw = [
    'model' => '',
    'speed' => '',
    'doors' => '',
    'year' => '',
];

$bmw['model'] = 'X5';
$bmw['speed'] = 120;
$bmw['doors'] = 5;
$bmw['year'] = 2015;


$toyota = [
    'model' => 'camry',
    'speed' => '240',
    'doors' => '4',
    'year' => '2017',
];
$opel = [
    'model' => 'astra',
    'speed' => '160',
    'doors' => '4',
    'year' => '2012',
];

$cars = ['bmw' => $bmw, 'toyota' => $toyota, 'opel' => $opel];

foreach ($cars as $key => $value) {
    print "CAR $key <br>";
    echo $value['model'].' '.$value['speed'].' '.$value['doors'].' '.$value['year'];
    echo "<br>";
}
