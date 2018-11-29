<?php
$outerHtml = '<h2>Редактирование пользователя '.$user_id.' </h2>
<span>Электронная почта: '.$user_email.'</span>

<form action="" method="post" enctype="multipart/form-data">
    <input style="display: none;" name="user_id" id="user_id" type="text" value="'.$user_id.'"/>
    <div>
        <label for="user_name_id">Имя</label>
        <input name="user_name" id="user_name_id" type="text" value="'.$user_name.'"/>
    </div>
    <div>
        <label for="user_age_id">Возраст</label>
        <input name="user_age" id="user_age_id" type="number" value="'.$user_age.'"/>
    </div>
    <div>
        <label for="user_description_id">Описание</label>
        <input name="user_description" id="user_description_id" type="text" value="'.$user_description.'"/>
    </div>
    <div>
        <label for="user_photo_id">Фото</label>
        <input type="file" name="user_photo" id="user_photo_id"/>
    </div>';

if ($photo_path) {
    $outerHtml .= '<div>
        <span>Фото</span>
        <img src="'.$_SERVER['HTTP_ORIGIN'].$photo_path.'" alt="фото пользователя">
    </div>';
} else {
    $outerHtml .= 'Фото отсутствует';
}

$outerHtml .= '
<div>
    <button type="submit">Применить изменения</button>
</div>
</form>';

echo $outerHtml;
