<?php
class Model {
	
	public $data;
	public $db;
	
	public function __construct() {
		$this->db = new myDB;
	}

	public function regUser() {
		//$this->data = array('status'=>'true','data'=>'ok');
		return $this->getData();		
	}

	public function publicUser() {
		$this->data = array('status'=>'false','data'=>'nok');
		return $this->data;
	}	


	public function getDetails($id) {
		if(!empty($id) && $id != 0) {
			$sql = "SELECT * FROM data LEFT JOIN users ON data.user = users.usersid WHERE dataid = $id";

			$this->db->sqlExec($sql);
			$this->data = $this->db->getResults();
		}
		return $this->data;
	}

	public function getData() {

		$sql = "SELECT * FROM data LEFT JOIN users ON data.user = users.usersid";
				$this->db->sqlExec($sql);
		$this->data = $this->db->getResults();
		return $this->data;
	}

	public function getUserData($id) {
		$sql = 'SELECT * FROM users WHERE usersid = ' . $id;
		$this->db->sqlExec($sql);
		$this->data = $this->db->getResults();
		return $this->data;
	}

	public function deleteData($id) {
		$this->data = '';
		$this->db->sqlExec('DELETE FROM data WHERE dataid=' . $id);
		//$this->data = $this->db->_results;
		//return $this->data;
	}
}
?>
