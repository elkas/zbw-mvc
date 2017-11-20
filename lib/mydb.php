<?php
class myDB {
	public  $_con;
	public  $_results;
	public  $_data;

	public function __construct(){
		$this->dbConnect();
	}

	function __destruct(){
		//$this->_con->close();
	}

	public function dbConnect(){
		//@$this->_con = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PW, MYSQL_DB);
		//if($this->_con->connect_errno){
			//echo "Keine Datenbank vorhanden, wird erstellt.";
    	//		$this->dbInstall();
		//}

        try {
            //$this->dbconn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", "$this->dbuser", "$this->dbpass");
            $this->_con = new PDO("mysql:host=".MYSQL_HOST, MYSQL_USER, MYSQL_PW);
			$this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$this->dbInstall();
			$this->sqlExec("USE ".MYSQL_DB);
            //$this->useDatabase();
        } catch (PDOException $e) {
            $msg = '<div class="alert alert-danger" role="alert"><h4>Keine Verbindung zur Datenbank möglich!</h4>' . $e->getMessage() . '</div>';
			die($msg);
			//$this->dbInstall();
			//header('location: /');
        }		
	}
	// Methode um Daten abzurufen model->sqlExec(SQL)
	function sqlExec($sqlstr)	{
		//$this->_results = $this->_con->query($sqlstr);
		$this->_results = $this->_con->prepare($sqlstr);
		$this->_results->execute();
		//$this->status = $this->result->execute();
	}

	public function getResults()
	{
		return $this->_results->fetchAll();
	}

	private function dbInstall(){
		// Verbindung aufbauen
		//$this->_con = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PW);
		// Falls DB nicht vorhanden -> erstellen
		$this->sqlExec("CREATE DATABASE IF NOT EXISTS " . MYSQL_DB);
		$this->sqlExec("USE ".MYSQL_DB);
		// Ausführen -> DB erstellen
		//$this->_con->query($sqlstr);
		// DB auswählen
		//$this->_con->select_db(MYSQL_DB);
		// Tabellenskript 
		$this->sqlExec("CREATE TABLE IF NOT EXISTS  users (
				usersid int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (usersid),
				loginname VARCHAR(15),
				firstname VARCHAR(30),
				lastname VARCHAR(30),
				description VARCHAR(150),
				loginpass VARCHAR(100),
				role INT(1) )");
		// Tabelle 1 erstellen -> ausführen
		//$this->_con->query($sqlstr);
		// Tabelle 2 erstellen
		$this->sqlExec("CREATE TABLE IF NOT EXISTS  data (
				dataid int NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (dataid),
				titel VARCHAR(150),
				inhalt VARCHAR(10000),
				datum TIMESTAMP NOT NULL,
				user INT NOT NULL )");
		// Tabelle 2 erstellen -> ausführen
		//$this->_con->query($sqlstr);

		// Tabelle 1 füllen
		$this->sqlExec("	INSERT INTO users (
						usersid, loginname, firstname, lastname, description, loginpass, role
					) VALUES (
						NULL, 'admin', 'Chief', 'Administrator', 'Ich bin der Administrator', 'admin', '2'
					),(
						NULL, 'user', 'Standard', 'Benutzer', 'Ich bin ein Benutzer', 'user', '1'
					),(
						NULL, 'demo', 'Michael', 'Demouser', 'Ich bin ein Demo-Benutzer', 'demo', '0'
					),(
						NULL, 'max', 'Max', 'Benutzer', 'Ich bin ein Benutzer', 'max', '1'
					),(
						NULL, 'tobias', 'Tobias', 'Benutzer', 'Ich bin ein Benutzer', 'tobias', '1'
					),(
						NULL, 'lady', 'Lady', 'Benutzer', 'Ich bin ein Benutzer', 'lady', '1'
					)");
		// Tabelle 1 füllen -> ausführen
		//$this->_con->query($sqlstr);
		// Tabelle 2 füllen
		$this->sqlExec("	INSERT INTO data (
						dataid, titel, inhalt, datum, user
					) VALUES (
						NULL, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br><br>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '1'
					),(
						NULL, 'Consetetur sadipscing elitr', 'Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '2'
					),(
						NULL, 'Sed diam nonumy eirmod tempor invidunt', 'Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '5'
					),(
						NULL, 'Ut labore et dolore magna aliquyam erat', 'Ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '4'
					),(
						NULL, 'Stet clita kasd gubergren', 'Stet clita kasd gubergren ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '3'
					),(
						NULL, 'At vero eos et accusam', 'At vero eos et accusam dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', NULL, '2'
					)");
		// Tabelle 2 füllen -> ausführen
		//$this->_con->query($sqlstr);
	}
}
?>