<?php

// Klassendefinition index-Controller
class Controller{
	// Variablen 
	private $view;
	private $model;

	// Konstruktor
	public function __construct() {
		// Model, View erstellen und abspeichern
		$this->model = new Model();
		$this->view = new View();
	}

	public function displayData($id){
		return $this->view->showContent($this->model->getData($id));
	}

	public function displayPublicData(){
		return $this->view->showContent($this->model->publicUser());
	}

	public function deleteData($id) {
		$this->model->deleteData($id);
		return $this->view->showContent($this->model->getData('0'));
	}
}
?>