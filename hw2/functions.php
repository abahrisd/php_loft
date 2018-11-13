<?php

function task1($strArr, $isReturnCombinedString = false)
{
    $result = '';
    foreach ($strArr as $key => $value) {
        echo '<p>'.$value.'</p>';
        if ($isReturnCombinedString) {
            $result .= $value;
        }
    }

    if ($isReturnCombinedString) {
        return $result;
    }
}

function task2()
{

    $data = func_get_args();
    $operation = $data[0];
    $numsArr = [];

    for ($i = 1; $i < sizeOf($data); $i++) {
        $numsArr[] = $data[$i];
    }

    $result = $resultStr = $numsArr[0];

    for ($j = 1; $j < count($numsArr); $j++) {
        switch ($operation) {
            case '+':
                $result = $result + $numsArr[$j];
                break;
            case '-':
                $result = $result - $numsArr[$j];
                break;
            case '/':
                if ($numsArr[$j] != 0) {
                    $result = $result / $numsArr[$j];
                }
                break;
            case '*':
                $result = $result * $numsArr[$j];
                break;
        }

        if (!($operation === '/' && $numsArr[$j] === 0)) {
            $resultStr .= ' '.$operation.' '.$numsArr[$j];
        }
    }

    $resultStr .= ' = '.$result;

    return $resultStr;
}

function task3($height, $length)
{
    if (!is_int($height) || !is_int($length) || $height <= 0 || $length <= 0) {
        echo 'Параметры функции должны быть натуральными числами';
    }

    echo '<style>
        .table-cell {
            width: 2rem;
            text-align: center;
        }
     </style>';

    echo '<table>';
    for ($i = 1; $i <= $height; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $length; $j++) {
            if ($i == 1) {
                echo '<th class="table-cell">'.$j.'</th>';
            }

            if ($j == 1) {
                echo '<th class="table-cell">'.$i.'</th>';
            }

            if ($i != 1) {
                $val = $i*$j;
                echo '<td class="table-cell">'.$val.'</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}

function task4()
{
    echo date('d.m.Y H:i');
    echo strtotime('24.02.2016 00:00:00');
    echo '<br>';
}

function task5()
{
    $str1 = 'Карл у Клары украл Кораллы';
    echo str_replace('К', '', $str1);
    echo '<br>';
    $str2 = 'Две бутылки лимонада';
    echo str_replace('Две', 'Три', $str2);
    echo '<br>';
}

function task6_1()
{
    $file = fopen('text.txt', "w");
    fwrite($file, 'Hello again!');
    fclose($file);
}

function task6_2($fileName)
{
    $fileData = file_get_contents($fileName);
    echo $fileData;
}
