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

	public function displayData(){
		return $this->view->showContent($this->model->regUser());
	}

	public function displayPublicData(){
		return $this->view->showContent($this->model->publicUser());
	}
}
?>