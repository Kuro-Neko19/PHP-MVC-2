<?php
    session_start();

    require_once realpath("Functions/get_location_from_file.php");

    $comm = 'null';
    $ii = 0;

    $ooo = explode('||..||', $Gallery[$_SESSION['img_id']]);
    $usr = $ooo[0];
    $aaa = explode('.', $ooo[1]);
    $bbb = explode('/', $aaa[4]);
    $ccc = $bbb[1]. '/'. $bbb[2]. '/'. $bbb[3] . '.txt';

    $comment = file("$ccc");

    if(isset($_SESSION['UserID']) && isset($_SESSION['UserLogin'])){
        if(isset($_POST['comm_but'])){
            $comm = $_POST['comment'];
            $arr = '.';
        }
        if(isset($arr) && isset($_SESSION['UserID']) && $comm != null){
            $user = $_SESSION['UserID'];
            $fileContent = file_get_contents("$ccc");
            file_put_contents("$ccc", $fileContent . $user . '|..|' . $comm . PHP_EOL, LOCK_EX);

            header("Refresh:0");
        }
    }

    if(isset($_SESSION['UserID']) && isset($_SESSION['UserLogin'])){
        if(isset($_POST['comm_del'])){
            $val = $_POST['comm_del'];
            $valid = explode('|..|', $comment[$val]);

            $usr = $_SESSION['UserID'];

            if($valid[0] == $usr){
                array_splice($comment, $val, 1);
                
                $last = array_key_last($comment);
                $fC = null;

                do{
                    file_put_contents("$ccc", $fC . $comment[$ii], LOCK_EX);
                    $fC = file_get_contents("$ccc");

                    $ii = $ii +1;
                }
                while($ii <= $last);
        
                header("Refresh:0");
            }
        }
    }
?>