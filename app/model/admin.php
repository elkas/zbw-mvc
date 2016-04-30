<?php
class Model {
	public $data;
	public $resp = [];
	private $db;
	
	public function __construct() {
		$this->loadData();
	}

	public function getUserData() {
		return $this->data;
	}

	public function deleteData($id) {
		if($id != 1) {
			$this->data = '';
			$this->db = new myDB();
			$this->db->sqlExec('DELETE FROM  users WHERE usersid=' . $id);
			$this->data = $this->db->_results;
		} else {
			$this->data = array('status'=>'false','message'=>'admin kann nicht gelöscht werden');
		}
		return $this->data;
	}

	public function insertData() {
		//return $this->data;
	}

	public function loadData() {
		$this->data = '';
		$this->db = new myDB();
		$this->db->sqlExec('SELECT * FROM  users');
		while($row = mysqli_fetch_object($this->db->_results)){
			$resp[] = array(
				'status'=>'true',
				'usersid'=>$row->usersid,
				'loginname'=>$row->loginname,
				'firstname'=>$row->firstname,
				'lastname'=>$row->lastname,
				'description'=>$row->description,
				'role'=>$row->role
			);
		}
		$this->data = $resp;
		$this->db = NULL;
		return $this->data;
	}
}
?>
