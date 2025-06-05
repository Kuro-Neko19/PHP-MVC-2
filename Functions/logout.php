<?php
    session_start();

    if(isset($_POST['logout_butt']) && isset($_SESSION['img_id'])){
        unset($_SESSION['UserID']);
        unset($_SESSION['UserLogin']);
        foreach($_COOKIE as $key => $value) setcookie($key, '', time() - 3600, '/');
        header("Location: /");
    }
?>