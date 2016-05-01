<?php

class Controller{
	private $view;
	private $model;
	
	public function __construct() {
		$this->model = new Model();
		$this->view	= new View();
	}
	
	public function displayData(){
		echo $this->view->showContent($this->model->regUser());
	}

	public function displayPublicData() {
		echo $this->view->showContent($this->model->publicUser());
	}

	public function formValidation() {
		$this->data = $this->model->formValidation();
		return $this->data;
	}
}
?>