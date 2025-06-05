<?php
    session_start();

    $mysql = mysqli_connect('MySQL-8.2', 'root', '', 'Users');
        if (mysqli_connect_errno()){
            echo 'Не удалось подключится к базе данных';
            exit();
        }

    $login = 'null';
    $password = 'null';
    $password1 = 'null';

    if(isset($_POST['reg_but'])){
        $login = $_POST['reg_login'];
        $password = $_POST['reg_pass'];
        $password1 = $_POST['reg_pass1'];
    }

    if($login != 'null' && $password != 'null' && $password1 != 'null'){
        if($password == $password1){
            $ok = '.';
        }
        else($err = '.');
    }
    
    if(isset($ok)){

        $in_pass = sha1($password);

        mysqli_query($mysql, "INSERT INTO users (login, password) VALUES ('$login', '$in_pass')");
        
        $_SESSION['UserID'] = $login;
        $_SESSION['UserLogin'] = true;

        header("Location: /");
    }
?>