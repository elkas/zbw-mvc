<?php

class Controller{
	private $view;
	private $model;
	
	public function __construct() {
		$this->model = new Model();
		$this->view	= new View();
	}
	
	public function displayData(){
		echo $this->view->showContent($this->model->data);
	}

	public function displayPublicData(){
		$this->displayData();
	}	
}
?>