
<h2>Форма регистрации</h2>

<form action="">
<!--<form action="--><?php //echo 'mvc'.$_SERVER['REQUEST_URI']?><!--">-->
    <div>
        <label for="email_id">Электропочта*</label>
        <input name="email" id="email_id" type="email"/>
    </div>

    <div>
        <label for="password_id">Пароль</label>
        <input name="password" id="password_id" type="password"/>
    </div>

    <button id="submitButton" type="submit">Зарегистрироваться</button>
</form>

<a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/login'?>">Войти</a>
