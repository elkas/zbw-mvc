<?php
class Model {
	public $data;
	private $meinedb;

	public function __construct() {
		//$this->data = "Nur ein Div neu laden";
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
