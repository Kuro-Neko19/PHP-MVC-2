<?php
    session_start();

    require_once realpath("Functions/get_login.php");

?>

<form class="logform" method="post">
    <p id="p">Логин:<input type="login" name="input_login"></p>
    <p id="p1">Пароль:<input type="password" name="input_password"></p>
    <input id="log" type="submit" value="Войти" name="log_but">
</form>