<?php
class Model {
	
	public $data;
	private $db;
	
	public function __construct() {
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
