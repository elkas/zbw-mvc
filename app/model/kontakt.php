<?php

class Model {
	public $data;
	public $error;
	
	public function __construct() {
	}

	public function formValidation() {
		// Daten auslesen
		$firstname = @$_POST['firstname'];
		$lastname = @$_POST['lastname'];
		$email = @$_POST['email'];
		$website = @$_POST['website'];
		$message = @$_POST['message'];
		$this->data = array_merge($_POST);

		//Establish values that will be returned via ajax
		$return = array();
		$this->error = false;

		// Validierung der Felder
		$return['firstname'] = $this->isEmpty($firstname) ? false : true;
		$return['lastname'] = $this->isEmpty($lastname) ? false : true;
		$return['email'] = $this->isEmpty($email) ? false : true;
		$return['message'] = $this->isEmpty($message) ? false : true;
		$return['error'] = $this->error ? true : false;
		$return['response'] = $this->error ? 'feld leer!' : $this->data;

		// JSON Daten zurückliefern
		return json_encode($return);

	}

	public function isEmpty($var) {
		$this->error = !isset($var) ? true : false;
		$this->error = empty($var) ? true : false;
		return $this->error;
	}

	public function regUser() {
		$this->data = array('status'=>'true','data'=>'ok');
		return $this->data;
	}

	public function publicUser() {
		//$this->data = array('status'=>'false','data'=>'nok');
		//return $this->data;
		return false;
	}
}
?>