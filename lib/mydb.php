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
		@$this->_con = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PW, MYSQL_DB);
		if($this->_con->connect_errno){
			echo "Keine Datenbank vorhanden, wird erstellt.";
    			$this->dbInstall();
		}
	}
	// Methode um Daten abzurufen model->sqlExec(SQL)
	function sqlExec($sqlstr)	{
		$this->_results = $this->_con->query($sqlstr);
	}

	private function dbInstall(){
		// Verbindung aufbauen
		$this->_con = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PW);
		// Falls DB nicht vorhanden -> erstellen
		$sqlstr = "CREATE DATABASE IF NOT EXISTS " . MYSQL_DB;
		// Ausführen -> DB erstellen
		$this->_con->query($sqlstr);
		// DB auswählen
		$this->_con->select_db(MYSQL_DB);
		// Tabellenskript 
		$sqlstr = "CREATE TABLE IF NOT EXISTS  users (
				usersid int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (usersid),
				loginname VARCHAR(15),
				firstname VARCHAR(30),
				lastname VARCHAR(30),
				description VARCHAR(150),
				loginpass VARCHAR(100),
				role INT(1) )";
		// Tabelle 1 erstellen -> ausführen
		$this->_con->query($sqlstr);
		// Tabelle 2 erstellen
		$sqlstr = "CREATE TABLE IF NOT EXISTS  data (
				dataid int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (dataid),
				titel VARCHAR(150),
				inhalt VARCHAR(10000),
				datum TIMESTAMP NOT NULL,
				user INT NOT NULL )";
		// Tabelle 2 erstellen -> ausführen
		$this->_con->query($sqlstr);

		// Tabelle 1 füllen
		$sqlstr = "	INSERT INTO users (
						usersid, loginname, firstname, lastname, description, loginpass, role
					) VALUES (
						NULL, 'admin', 'Admin', 'Benutzer', 'Ich bin ein Administrator', 'admin', '2'
					),(
						NULL, 'user', 'Standard', 'Benutzer', 'Ich bin ein Benutzer', 'user', '1'
					),(
						NULL, 'demo', 'Demo', 'Benutzer', 'Ich bin ein Demonstrator', 'demo', '0'
					),(
						NULL, 'max', 'Max', 'Benutzer', 'Ich bin ein Administrator', 'admin', '1'
					),(
						NULL, 'tobias', 'Tobias', 'Benutzer', 'Ich bin ein Benutzer', 'user', '0'
					),(
						NULL, 'lady', 'Lady', 'Benutzer', 'Ich bin ein Demonstrator', 'demo', '0'
					)";
		// Tabelle 1 füllen -> ausführen
		$this->_con->query($sqlstr);
		// Tabelle 2 füllen
		$sqlstr = "	INSERT INTO data (
						dataid, titel, inhalt, datum, user
					) VALUES (
						NULL, 'Beitrag 1', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '1'
					),(
						NULL, 'Beitrag 2', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '1'
					),(
						NULL, 'Beitrag 3', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '1'
					),(
						NULL, 'Beitrag 4', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '1'
					),(
						NULL, 'Beitrag 5', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '1'
					),(
						NULL, 'Beitrag 6', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '1'
					)";
		// Tabelle 2 füllen -> ausführen
		$this->_con->query($sqlstr);
	}
}
?>