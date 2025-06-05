<?php

class Controller_Services extends Controller
{

	function __construct()
	{
		$this->model = new Model_Services();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_services.php', 'template_view.php', $data);
	}
}
?>