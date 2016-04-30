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
		$this->data = $this->model->deleteData($id);
		return $this->data;
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