<?php
$outerHtml = '<h2>Редактирование пользователя '.$userId.' </h2>

<span>Электронная почта</span>
<form action="">
    <input style="display: none;" disabled name="email" id="email_id" type="email" value="'.$user_email.'"/>
    <div>
        <label for="name_id">Имя</label>
        <input name="name" id="name_id" type="text" value="'.$user_name.'"/>
    </div>
</form>
user_id: '.$user_id.
'user_name: '.$user_name.
'user_age: '.$user_age.
'user_description: '.$user_description.
'user_photo: '.$user_photo.
'user_email: '.$user_email;

echo $outerHtml;
