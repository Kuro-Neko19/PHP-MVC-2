<?php
    session_start();
    
    require_once realpath("Functions/get_regist.php");
?>

<form class="regform" method="post">
    <p id="pp">Логин:<input type="login" name="reg_login"></p>
    <p id="pp1">Пароль:<input type="password" name="reg_pass"></p>
    <p id="pp2">Повторите пароль:<input type="password" name="reg_pass1"></p>
    <input id="reg" type="submit" value="Зарегистрироваться" name="reg_but">
</form>