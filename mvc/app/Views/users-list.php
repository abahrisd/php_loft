<?php
$outerHtml = '
<div>
    <a href="http://'.$_SERVER['HTTP_HOST'].'/user/list?sort=asc">Сортировать по возрастанию возраста</a>
    <a href="http://'.$_SERVER['HTTP_HOST'].'/user/list?sort=desc">Сортировать по убыванию возраста</a>
</div>
<h2>Список пользвателей</h2>
<table>
<tr>
<th>Имя</th>
<th>Возраст</th>
<th>Описание</th>
<th>email</th>
<th>фото</th>
</tr>';

foreach ($users as $user) {
    $outerHtml .= ' <tr>
        <td>'.$user['user_name'].'</td>
        <td>'.$user['user_age'].', '.($user['user_age'] > 18 ? "Совершеннолетний" : "Несовершеннолетний").'</td>
        <td>'.$user['user_description'].'</td>
        <td>'.$user['user_email'].'</td>
        <td><img height="50px" src="'.$_SERVER['HTTP_ORIGIN'].$user['photo_path'].'" alt="Нет фото"></td>
    </tr>';
}

$outerHtml .= '</table>';
echo $outerHtml;
