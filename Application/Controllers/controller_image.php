<?php
class Controller_Image extends Controller 
{ 
   function action_index() 
   { 
    $this->view->generate('image_view.php', 'base_view.php'); 
   } 
}
?>