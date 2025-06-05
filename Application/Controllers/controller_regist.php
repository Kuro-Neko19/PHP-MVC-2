<?php
class Controller_Regist extends Controller 
{ 
   function action_index() 
   { 
    $this->view->generate('regist_view.php', 'empty_view.php'); 
   } 
}
?>