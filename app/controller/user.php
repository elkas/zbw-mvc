<?php

class Controller {
	private $view;
	private $model;
	
	public function __construct() {
		$this->model = new Model();
		$this->view	= new View();

		if(@$_GET['action']=='logout') {
			$this->logOut();
		}
	}
	
	public function logOut() {
		//$_SESSION['admin'] = '';
		//$_SESSION['admin'] = NULL;
		unset($_SESSION);
		session_destroy();
		header('location=index.php');
	}

	public function displayData(){
		//zeige Daten oder Form
		if($_POST){
			// stimmt Loginname und Passwort
			$this->model->checkLoginData($_POST['ui_login_username'], $_POST['ui_login_password']);
			if($this->model->check == 0){
				// falscher Username oder Passwort
				echo $this->view->showContent($this->model->showForm());
			} else {
				// Login erfolgreich , ID des users wird angezeigt
				echo $this->view->showContent($this->model->showData());
			}
		} else {
			echo $this->view->showContent($this->model->showForm());
		}
	}

	public function displayPublicData() {
		$this->displayData();
	}
}
?>