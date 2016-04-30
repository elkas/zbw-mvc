<?php

class Controller{
	private $view;
	private $model;
	
	public function __construct() {
		$this->model	= new model();
		$this->view	= new view();
	}
	
	public function displayData(){
		echo $this->view->showContent($this->model->regUser());
	}

	public function displayPublicData() {
		echo $this->view->showContent($this->model->publicUser());
	}
}
?>