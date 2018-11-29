<h2>Форма входа</h2>

<form action="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="email_id">Электропочта*</label>
        <input name="email" id="email_id" type="email"/>
    </div>
    <div>
        <label for="password_id">Пароль</label>
        <input name="password" id="password_id" type="password"/>
    </div>

    <button id="submitButton" type="submit">Войти</button>
</form>
