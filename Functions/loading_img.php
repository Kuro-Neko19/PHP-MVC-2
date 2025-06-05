<?php
    session_start();

    $mysql = mysqli_connect('MySQL-8.2', 'root', '', 'Users');
        if (mysqli_connect_errno()){
            echo 'Не удалось подключится к базе данных';
            exit();
        }

    if(isset($_SESSION['UserID']) && isset($_SESSION['UserLogin'])){
        if($_FILES && $_FILES["file_gall"]["error"]== UPLOAD_ERR_OK && $_FILES["file_gall"]["size"] < FILESIZE && ($_FILES["file_gall"]["type"] == TJ || $_FILES["file_gall"]["type"] == TP || $_FILES["file_gall"]["type"] == TG)){

            $a1 = random_int(0, 9);
            $a2 = random_int(0, 9);
            $a3 = random_int(0, 9);
            $a_all = $a1. $a2. $a3;


            if(file_exists('Gallery/'. $a_all)) {
                do{
                    $b1 = random_int(0, 9);
                    $b2 = random_int(0, 9);
                    $b3 = random_int(0, 9);
                    $b_all = $b1. $b2. $b3;
                }
                while(file_exists('Gallery/'. $b_all) == false);

                $a_all = $b_all;
        }
        
            if (!file_exists('Gallery/'. $a_all)) { 
                mkdir('Gallery/'. $a_all);

                $type = explode('/', $_FILES["file_gall"]["type"]);
            
                $all = 'загружено';

                $loc = '../../Gallery/'. $a_all. '/'. $_FILES["file_gall"]["name"];

                $_FILES["file_gall"]["name"] = $a_all . '.' . $type[1];
                $name = "Gallery/". $a_all. '/'. $_FILES["file_gall"]["name"];
                move_uploaded_file($_FILES["file_gall"]["tmp_name"], $name);

                $loc = '../../Gallery/'. $a_all. '/'. $_FILES["file_gall"]["name"];
                $us = $_SESSION['UserID'];

                mysqli_query($mysql, "INSERT INTO publications (user, location) VALUES ('$us', '$loc')");

                $text_loc = 'Gallery/' . $a_all. '/'. $a_all. '.txt';
                file_put_contents("$text_loc", 'null' . PHP_EOL, LOCK_EX);
            }
        }
    }

?>