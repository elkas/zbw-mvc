<?php
class Model {
	
	public $data;
	private $db;
	
	public function __construct() {
	}

	public function regUser() {
		//$this->data = array('status'=>'true','data'=>'ok');
		return $this->getData();		
	}

	public function publicUser() {
		$this->data = array('status'=>'false','data'=>'nok');
		return $this->data;
	}	

	public function getData($id) {
		if($id == '0') {
			$sql = 'SELECT * FROM  data';
		} else {
			$sql = 'SELECT * FROM data WHERE dataid = ' . $id;
		}

		$this->db = new myDB();
		$this->db->sqlExec($sql);
		$this->data = $this->db->_results;

		while($row = mysqli_fetch_object($this->data)){
			$user = $this->getUserData($row->user);
			$name = $user[0]['firstname'] .' '. $user[0]['lastname'];
			$resp[] = array(
				'status'=>'true',
				'id'=>$row->dataid,
				'titel'=>$row->titel,
				'inhalt'=>$row->inhalt,
				'datum'=>$row->datum,
				'user'=>$name
			);
		}
		$this->data = $resp;
		$this->db = NULL;
		return $this->data;
	}

	public function getUserData($id) {
		$sql = 'SELECT * FROM users WHERE usersid = ' . $id;
		$this->db->sqlExec($sql);
		while($row = mysqli_fetch_object($this->db->_results)) {
			$user[] = array(
				'status'=>'true',
				'usersid'=>$row->usersid,
				'loginname'=>$row->loginname,
				'firstname'=>$row->firstname,
				'lastname'=>$row->lastname,
				'description'=>$row->description,
				'role'=>$row->role
			);
		}
		if(@$user) {
			return $user;
		} else {
			return false;
		}
	}

	public function deleteData($id) {
		$this->data = '';
		$this->db = new myDB();
		$this->db->sqlExec('DELETE FROM data WHERE dataid=' . $id);
		$this->data = $this->db->_results;
		return $this->data;
	}
}
?>
