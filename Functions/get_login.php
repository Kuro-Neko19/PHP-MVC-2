<?php
    session_start();

    $login = 'null';
    $password = 'null';
    $a = 0;

    $mysql = mysqli_connect('MySQL-8.2', 'root', '', 'Users');
        if (mysqli_connect_errno()){
            echo 'Не удалось подключится к базе данных';
            exit();
        }

    $sql = "SELECT * FROM users";
    $result = mysqli_query($mysql, $sql);
    while($usrs = mysqli_fetch_assoc($result)){
        $userslog[$a] = trim($usrs['login']);
        $userspass[$a] = trim($usrs['password']);

        $a = $a + 1;
    }


    
    if(isset($_POST['log_but'])){
        $login = $_POST['input_login'];
        $password = $_POST['input_password'];
    }

    if($login !== 'null' && $password !== 'null'){
        $arr_key = array_search($login, $userslog);

        if(sha1($password) == trim($userspass[$arr_key])){
            $psw = 0;
        }
    }
        
    if(isset($psw)){
        $_SESSION['UserID'] = $login;
        $_SESSION['UserLogin'] = true;
            
        header("Location: /");
    }
    
?>