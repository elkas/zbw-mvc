<?php

	// Session starten
	session_start();   

	// Datenbank einbinden
	define('MYSQL_HOST', "localhost");
	define('MYSQL_USER' ,"root");
	define('MYSQL_PW' ,"");
	define('MYSQL_DB', "m151");
	
	// Datenbank Verbindungsklasse
	if(file_exists('./lib/mydb.php')) {
		include_once('./lib/mydb.php') ;
	} else {
		echo "Kann datei ./lib/mydb.php nicht finden";
	}

	// $_GET und $_POST zusammenfasen, $_COOKIE interessiert uns nicht.
	$request = array_merge($_GET, $_POST);
	$controller = !empty($request['controller']) ? $request['controller'] : 'index';
	$action = !empty($request['action']) ? $request['action'] : 'view';
	$id = !empty($request['id']) ? $request['id'] : '0';

	// Controller erstellen und Anzeige
	appLoader($controller);

	// MVC laden, erwartet einen Parameter, welcher Controller soll geladen werden?
	function appLoader($module) {
		$class = strtolower($module);
		// Wenn Datei nicht vorhanden ist
		if(!file_exists('./app/controller/'. $class . '.php')) {
			$class = 'index';
		}
		
		$controller = './app/controller/'. $class . '.php';
		$model 		= './app/model/'. $class . '.php';
		$view		= './app/view/'. $class . '.php';

		// Klassendateien einbinden
		include_once($controller) ;
		include_once($model) ;
		include_once($view) ;
	}

	// Controller instanziieren
	$controller = new Controller(); 

	if(@$_SESSION['usersid']) {
		// Benutzerauthentifizierung OK
		$validuser = true;
	}

	// Nur wenn Benutzer angemeldet ist!
	if(isset($validuser)) {
		if($action == 'view') {
			echo $controller->displayData();
		} else if($action == 'delete') {
			echo $controller->deleteData($id); 
		} else if($action == 'insert') {
			echo $controller->insertData(); 
		} else if($action == 'load') {
			echo $controller->loadData(); 
		}
	} else {
		echo $controller->displayPublicData(); 
	}
?>