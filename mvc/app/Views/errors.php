<?php
if ($isWrongCredentials === true) {
    echo 'Данные введены неверно!';
}

if (is_array($errors)) {
    echo '<div style="color: red;">';
    foreach ($errors as $key => $value) {
        echo 'Ошибка: '.$value;
    }
    echo '</div>';
}
