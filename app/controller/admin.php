<?php

class Controller {
	private $view;
	private $model;
	
	public function __construct() {
		$this->model = new Model();
		$this->view	= new View();
	}
	
	public function displayData(){
		echo $this->view->showContent($this->model->getUserData());
	}

	public function displayPublicData(){
		header('location: ?controller=index');
	}

	public function deleteData($id) {
		$this->model->deleteData($id);
		//$this->model->loadData();
		//$this->data = $this->model->getUserData();
		//return json_encode($this->data);
	}

	public function loadData() {
		$this->data = $this->model->loadData();
		return json_encode($this->data);
	}

	public function insertData(){
		//echo $this->view->showContent($this->model->getUserData());
	}
}
?>