<?php
$outerHtml = '
<h2>Фалы пользователя '.$user_email.'</h2>';
$counter = 1;
foreach ($userFiles as $file) {
    $outerHtml .= ' <div>
        <span>'.$counter++.'</span> <img height="50px" src="'.$_SERVER['HTTP_ORIGIN'].$file['photo_path'].'" alt="Нет фото">
    </div>';
}

echo $outerHtml;
