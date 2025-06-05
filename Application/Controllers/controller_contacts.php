<?php
class Controller_Contacts extends Controller { 
function action_index() { 
$this->view->generate('view_contacts.php', 'template_view.php'); 
} 
}
?>