<?php
class myDB {
	public  $_con = null;
	public  $_results = null;

	public function __construct(){
		$this->dbConnect();
	}

	function __destruct(){
		$this->_con->close();
	}

	public function dbConnect(){
		$this->_con = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PW, MYSQL_DB);
		if($this->_con->connect_errno){
			echo "Keine Datenbank vorhanden, wird erstellt.";
    			$this->dbInstall();
		}
	}
	function sqlExec($sqlstr)	{
		$this->_results = $this->_con->query($sqlstr);
	}

	private function dbInstall(){
		$this->_con = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PW);
		$sqlstr = "CREATE DATABASE IF NOT EXISTS " . MYSQL_DB;
		$this->_con->query($sqlstr);
		$this->_con->select_db(MYSQL_DB);
		$sqlstr = "CREATE TABLE IF NOT EXISTS  users (
				usersid int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (usersid),
				loginname VARCHAR(15),
				firstname VARCHAR(30),
				lastname VARCHAR(30),
				description VARCHAR(150),
				loginpass VARCHAR(100),
				role INT(1) )";

		$this->_con->query($sqlstr);
		$sqlstr = "	INSERT INTO users (
						usersid, loginname, firstname, lastname, description, loginpass, role
					) VALUES (
						NULL, 'admin', 'Admin', 'Benutzer', 'Ich bin ein Administrator', 'admin', '2'
					),(
						NULL, 'user', 'Standard', 'Benutzer', 'Ich bin ein Benutzer', 'user', '1'
					),(
						NULL, 'demo', 'Demo', 'Benutzer', 'Ich bin ein Demonstrator', 'demo', '0'
					)";

		$this->_con->query($sqlstr);
	}
}
?>