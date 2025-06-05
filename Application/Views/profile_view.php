<?php
    session_start();

    require_once realpath("Functions/logout.php");
?>

<div class="profil">
    <p id="p">Профиль:</p>
    <p id="pp"><?
        if(isset($_SESSION['UserID'])){
            echo($_SESSION['UserID']);
        }
    ?>
    </p>
</div>
    <form method="post">
        <button id="logout" type="submit" name="logout_butt">Выйти</button>
    </form>
