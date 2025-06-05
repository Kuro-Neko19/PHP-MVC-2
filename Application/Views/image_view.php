<?php
    session_start();

    require_once realpath("Functions/get_location_from_file.php");
    require_once realpath("Functions/get_comment.php");

    $DB = array_key_last($comment);
    $i = 1;

    $em = ' ';
?>
<div id="img">
    <img src="<?echo($Gallery[$_SESSION['img_id']]);?>" alt="картинка">
</div>
<form class="<?
    if(!isset($_SESSION['UserID']) || $usr !== $_SESSION['UserID']){
        echo 'hidden';
    }
    if(isset($_SESSION['UserID']) && $usr == $_SESSION['UserID']){
        echo 'del';
    }
    ?>" method="post">
    <input type="submit" value="Удалить" name="img_del">
</form>

<form class="txt" method="post">
    <div id="text_ar">
        <textarea name="comment" rows="5" cols="30"></textarea>
    </div>
    <div id="<?
    if(isset($_SESSION['UserID'])){
        echo 'post';
    }
    else echo 'hidden';
    ?>">
        <input type="submit" value="Отправить" name="comm_but">
    </div>
</form>

<form class="comm" method="post">
<?
    if($DB > 0){
        do{
            $parts = explode('|..|', $comment[$i]);

            if(isset($_SESSION['UserID']) && $parts[0] == $_SESSION['UserID']){
                echo ('<tr><td>' . '>' . '</td><td>'.$parts[0].'</td><td>'. $em .'</td><td>'.$parts[1].'</td></tr>');
                if(isset($_SESSION['UserID']) && $parts[0] == $_SESSION['UserID']){
                    echo ('<button name="comm_del" type="submit" value="' . $i . '">Удалить</button>') . "<br />";
                }
                else echo "<br />";
            }

            if(!isset($_SESSION['UserID']) || $parts[0] !== $_SESSION['UserID']){
                echo ('<tr><td>'.$parts[0].'</td><td>'. $em .'</td><td>'.$parts[1].'</td></tr>');
                if(isset($_SESSION['UserID']) && $parts[0] == $_SESSION['UserID']){
                    echo ('<button name="comm_del" type="submit" value="' . $i . '">Удалить</button>') . "<br />";
                }
                else echo "<br />";
            }

            $i = $i + 1;
        }
        while($i <= $DB);
    }
?>
</form>

<?
    $ooo = explode('||..||', $Gallery[$_SESSION['img_id']]);
    $aaa = explode('.', $ooo[1]);
    $bbb = explode('/', $aaa[4]);
    $ccc = $bbb[1]. '/'. $bbb[2]. '/'. $bbb[3] . '.txt';
    $ddd = $bbb[1]. '/'. $bbb[2]. '/'. $bbb[3] . '.png';
    $ddd1 = $bbb[1]. '/'. $bbb[2]. '/'. $bbb[3] . '.jpeg';
    $ddd2 = $bbb[1]. '/'. $bbb[2]. '/'. $bbb[3] . '.gif';
    $eee = $bbb[1]. '/'. $bbb[2];

    if(isset($_SESSION['UserID']) && isset($_SESSION['UserLogin'])){
        if(isset($_POST['img_del']) && $_SESSION['UserID'] == $ooo[0]){
            $img_del = $ooo[1];

            unlink($ccc);
            unlink($ddd);
            unlink($ddd1);
            unlink($ddd2);
            rmdir($eee);

            mysqli_query($mysql, "DELETE FROM publications WHERE location = '$img_del'");
        
            header("Location: /");
        }
    }
?>

