<?php

// index-Controller
class Controller {
	private $view;
	private $model;
	private $data;

	// Konstruktor
	public function __construct() {
		// Model, View erstellen und lokal im Objekt abspeichern
		$this->model = new Model();
		$this->view = new View();
	}

	// z.B. $controller->displayData(1)
	public function displayData($id){
		// Daten via Model aufbereiten und lokal abspeichern
		$this->data = $this->model->getData($id);

		// View mit Daten versorgen, View anzeigen
		return $this->view->showContent($this->data);

		// Eine weitere Variante wäre der direkte Aufruf im "return" wie folgt
		// return $this->view->showContent($this->model->getData($id));
	}

	// z.B. $controller->displayPublicData()
	public function displayPublicData(){
		// Daten via Model aufbereiten und lokal abspeichern
		$this->data = $this->model->publicUser();

		// View mit Daten versorgen, View anzeigen
		return $this->view->showContent($this->data);
	}

	// z.B. $controller->deleteData(1)
	public function deleteData($id) {
		// Daten via Model aufbereiten und lokal abspeichern
		$this->model->deleteData($id);
		$this->data = $this->model->getData('0');

		// View mit Daten versorgen, View anzeigen
		return $this->view->showContent($this->data);
	}
}
?>