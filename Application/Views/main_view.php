<?php
     session_start();
     
    if(isset($_SESSION['img_id']) && $_SESSION['img_id'] >= 1){
        $_SESSION['img_id'] = 0;
    }
    if(!isset($_SESSION['img_id'])){
        $_SESSION['img_id'] = 0;
    }

    require_once realpath("Functions/get_location_from_file.php");

    if($int > $lastK){
         $id = "hidden_gall";
     }
     if($int + 1 > $lastK){
         $id1 = "hidden_gall";
     }
     if($int + 2 > $lastK){
         $id2 = "hidden_gall";
     }
     if($int + 3 > $lastK){
         $id3 = "hidden_gall";
     }
     if($int + 4 > $lastK){
         $id4 = "hidden_gall";
     }
     if($int + 5 > $lastK){
         $id5 = "hidden_gall";
     }
     if($int + 6 > $lastK){
         $id6 = "hidden_gall";
     }
     if($int + 7 > $lastK){
         $id7 = "hidden_gall";
     }
     if($int + 8 > $lastK){
         $id8 = "hidden_gall";
     }

    if($int <= $lastK){
         $id = "gall";
     }
     if($int + 1 <= $lastK){
         $id1 = "gall";
     }
     if($int + 2 <= $lastK){
         $id2 = "gall";
     }
     if($int + 3 <= $lastK){
         $id3 = "gall";
     }
     if($int + 4 <= $lastK){
         $id4 = "gall";
     }
     if($int + 5 <= $lastK){
         $id5 = "gall";
     }
     if($int + 6 <= $lastK){
         $id6 = "gall";
     }
     if($int + 7 <= $lastK){
         $id7 = "gall";
     }
     if($int + 8 <= $lastK){
         $id8 = "gall";
     }
    if(intdiv($lastK, $int + 8) > 0){
         $pg_btn1 = "pg_btn1";
     }
    if(intdiv($lastK, $int + 8) < 1){
         $pg_btn1 = "pg_hidden";
     }
    if($int > 9){
         $pg_btn = "pg_btn";
     }
    if($int < 10){
         $pg_btn = "pg_hidden";
     }
?>


<form action="/image" method="post">
    <div class="gall_line">
        <button id="<?echo $id;?>" name="cell_1" type="submit" value="1"><img src="<?echo $Gallery[$int];?>"></button>
        <button id="<?echo $id1;?>" name="cell_2" type="submit" value="2"><img src="<?echo $Gallery[$int + 1];?>"></button>
        <button id="<?echo $id2;?>" name="cell_3" type="submit" value="3"><img src="<?echo $Gallery[$int + 2]?>"></button>
    </div>

    <div class="gall_line">
        <button id="<?echo $id3;?>" name="cell_4" type="submit" value="4"><img src="<?echo $Gallery[$int + 3]?>"></button>
        <button id="<?echo $id4;?>" name="cell_5" type="submit" value="5"><img src="<?echo $Gallery[$int + 4]?>"></button>
        <button id="<?echo $id5;?>" name="cell_6" type="submit" value="6"><img src="<?echo $Gallery[$int + 5]?>"></button>
    </div>

    <div class="gall_line">
        <button id="<?echo $id6;?>" name="cell_7" type="submit" value="7"><img src="<?echo $Gallery[$int + 6]?>"></button>
        <button id="<?echo $id7;?>" name="cell_8" type="submit" value="8"><img src="<?echo $Gallery[$int + 7]?>"></button>
        <button id="<?echo $id8;?>" name="cell_9" type="submit" value="9"><img src="<?echo $Gallery[$int + 8]?>"></button>
    </div>
</form>
<form method="post">
    <div class="pg">
        <button id="<?echo $pg_btn?>" name="previous"><?echo '<'?></button>
        <button id="<?echo $pg_btn1?>" name="next"><?echo '>'?></button>
    </div>
</form>