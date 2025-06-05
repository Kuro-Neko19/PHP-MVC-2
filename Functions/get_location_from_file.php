<?php
    session_start();

    $a = 0;

    if(!isset($_SESSION['page'])){
        $_SESSION['page'] = 1;
    }

    $mysql = mysqli_connect('MySQL-8.2', 'root', '', 'Users');
        if (mysqli_connect_errno()){
            echo 'Не удалось подключится к базе данных';
            exit();
        }
    $sql = "SELECT * FROM publications";
    $result = mysqli_query($mysql, $sql);
    while($pblc = mysqli_fetch_assoc($result)){
        $User = trim($pblc['user']);
        $Loc = trim($pblc['location']);
        $Gallery[$a] = $User . '||..||' . $Loc;

        $a = $a + 1;
    }

    
    $lastK = array_key_last($Gallery);
    $int = $_SESSION['page'];


    if(isset($_POST['cell_1'])){
        $_SESSION['img_id'] = $int;
    }

    if(isset($_POST['cell_2'])){
        $_SESSION['img_id'] = $int + 1;
    }
    
    if(isset($_POST['cell_3'])){
        $_SESSION['img_id'] = $int + 2;
    }
    
    if(isset($_POST['cell_4'])){
        $_SESSION['img_id'] = $int + 3;
    }
    
    if(isset($_POST['cell_5'])){
        $_SESSION['img_id'] = $int + 4;
    }
    
    if(isset($_POST['cell_6'])){
        $_SESSION['img_id'] = $int + 5;
    }
    
    if(isset($_POST['cell_7'])){
        $_SESSION['img_id'] = $int + 6;
    }
    
    if(isset($_POST['cell_8'])){
        $_SESSION['img_id'] = $int + 7;
    }
    
    if(isset($_POST['cell_9'])){
        $_SESSION['img_id'] = $int + 8;
    }


    if(isset($_POST['next']) && intdiv($lastK, $int + 8) > 0){
        $_SESSION['page'] = $_SESSION['page'] + 9;
        header("Refresh:0");
    }

    if(isset($_POST['previous']) && $int > 9){
        $_SESSION['page'] = $_SESSION['page'] - 9;
        header("Refresh:0");
    }
?>