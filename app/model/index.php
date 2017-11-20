<?php
class Model {
	
	public $data;
	private $db;
	
	public function __construct() {
		$this->db = new myDB();
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
		if($id == "0") {
			$sql = "SELECT * FROM data LEFT JOIN users ON data.user = users.usersid";
		} else {
			$sql = "SELECT * FROM data LEFT JOIN users ON data.user = users.usersid WHERE dataid = $id";
		}

		$this->db->sqlExec($sql);
		$this->data = $this->db->_results;

		if($this->db) {
			$this->data = $this->db->getResults();
			//var_dump($this->data);
			//while($row = mysqli_fetch_object($this->data)){
			
			//	foreach ($result as $key => $value) {
				//$user = $this->getUserData($row->user);
				//$data = array_shift($user);
				//$name = $data['firstname'] .' '. $data['lastname'];
				//$this->data = array(
					//'status'=>'true',
					//'id'=>$value["dataid"],
					//'titel'=>$value["titel"],
					//'inhalt'=>$value["inhalt"],
					//'datum'=>$value["datum"],
					//'user'=>'$name'
				//);
			//}
		} else {
			$this->data = array('status'=>'false','data'=>'nok');
		}

		$this->db = NULL;
		//print_r($this->data);
		return $this->data;

	}

	public function getUserData($id) {
		$sql = 'SELECT * FROM users WHERE usersid = ' . $id;
		$this->db->sqlExec($sql);
		/*while($row = mysqli_fetch_object($this->db->_results)) {
			$user[] = array(
				'status'=>'true',
				'usersid'=>$row->usersid,
				'loginname'=>$row->loginname,
				'firstname'=>$row->firstname,
				'lastname'=>$row->lastname,
				'description'=>$row->description,
				'role'=>$row->role
			);
		}*/
		if(@$user) {
			return $user;
		} else {
			return false;
		}
	}

	public function deleteData($id) {
		$this->data = '';
		$this->db->sqlExec('DELETE FROM data WHERE dataid=' . $id);
		//$this->data = $this->db->_results;
		//return $this->data;
	}
}
?>
