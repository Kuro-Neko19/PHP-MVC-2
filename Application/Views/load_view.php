<?php
   session_start();

   require_once realpath("Functions/loading_img.php");
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file_gall">
    <input type="submit" value="Загрузить" name="load">
</form>
<?
   if(isset($all)){
    echo $all;
   }
?>