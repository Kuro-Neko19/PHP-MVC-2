<?php
    session_start();
    
    require_once realpath('config.php')
?>


<!DOCTYPE html> 
<html lang="ru"> 
<head> 
    <meta charset="utf-8"> 
    <title>Галлерея</title> 
    <link rel="stylesheet" href="../../CSS/main_style.css">
    <link rel="stylesheet" href="../../CSS/img_style.css">
    <link rel="stylesheet" href="../../CSS/prof.css">
</head> 
<body>
    <div class="menu">
	   <a id="bs_gall" href="/">Галлерея</a>
	   <a id="bs_load" href="/load">Загрузка</a>
    </div>

    <div class="<?
         if(!isset($_SESSION['UserLogin'])){
            echo ('logreg');
         }
         else echo ('hidden');
         ?>">
        <div id="log">
	        <a href="/login">Вход</a>
        </div>
        <div id="reg">
	        <a href="/regist">Регистрация</a>
        </div>
    </div>
    <div class="<?
         if(isset($_SESSION['UserLogin'])){
            echo ('profile');
         }
         else echo ('hidden');
         ?>">
        <div id="prof">
            <a href="/profile">Профиль</a>
        </div>
    </div>
<?php include 'application/views/'.$content_view; ?>
</body>
</html>