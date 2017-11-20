<?php
class Model {
	public $data;
	public $check;
	public $role;
	private $db;

	public function __construct(){
	}
	
	public function checkLoginData($_name,$_pass){
		$this->check = 0;
		$this->role = 0;

		$this->db = new myDB();
		$this->db->sqlExec('SELECT * FROM users');
		$this->data = $this->db->getResults();

		foreach ($this->data as $row) {
			if ($row['loginname'] == $_name && $row['loginpass'] == $_pass){
				$this->check = $row['usersid'];
				$this->role = $row['role'];
				$this->data = array('status'=>'true','data'=>$row['loginname'],'firstname'=>$row['firstname'],'lastname'=>$row['lastname'],'description'=>$row['description']);
				
				// Session Variable setzen
				$_SESSION['admin'] = intval($this->check);
				$_SESSION['usersid'] = intval($this->check);
				$_SESSION['role'] = intval($this->role);
				$_SESSION['username'] = $row['loginname'];
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
			}
		}
		$this->db = NULL;	
		return $this->check;
		
		//var_dump($this->data);
	}

	public function showForm(){
		$this->data = array('status'=>'false','data'=>'nok');
		return $this->data;
	}

	public function showData(){
		return $this->data;
	}	
}
?>
