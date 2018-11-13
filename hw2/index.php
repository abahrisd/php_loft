<?php

require('./functions.php');

task1(['str1', 'str2', 'str3'], true);

$task2Res = task2('/', 4, 6, 0, 2, 7);
echo $task2Res;
echo '<br>';
task3(-3, 7);
task3(3, 7);

task4();

task5();

task6_1();
task6_2('text.txt');
