<?php

	// Session starten
	session_start();   

	// Datenbank Zugangsdaten definieren
	define('MYSQL_HOST', "localhost");
	define('MYSQL_USER' ,"root");
	define('MYSQL_PW' ,"");
	define('MYSQL_DB', "m307_uekmvc");
	
	// Datenbank Verbindungsklasse einbinden
	if(file_exists('./lib/mydb.php')) {
		include_once('./lib/mydb.php') ;
	} else {
		echo "Kann datei ./lib/mydb.php nicht finden";
	}

	// $_GET und $_POST zusammenfasen, $_COOKIE interessiert uns nicht.
	$request = array_merge($_GET, $_POST);
	// Wenn kein Controller angegeben, ist controller=index
	$controller = !empty($request['controller']) ? $request['controller'] : 'index';
	// Wenn keine action angegeben, ist action=view
	$action = !empty($request['action']) ? $request['action'] : 'view';
	// Wird z.B. beim Löschen verwendet
	$id = !empty($request['id']) ? $request['id'] : '0'; 

	// Dateien für das angeforderte Modul vorbereiten
	appLoader($controller);

	// MVC laden, erwartet einen Parameter, welcher Controller soll geladen werden?
	function appLoader($module) {
		$class = strtolower($module);
		// Wenn angeforderte Datei nicht vorhanden ist wird index-Controller aufgerufen
		if(!file_exists('./app/controller/'. $class . '.php')) {
			$class = 'index';
		}
		
		// Klassendateien für das angeforderte Modul einbinden
		$controller = './app/controller/'. $class . '.php';
		$model 		= './app/model/'. $class . '.php';
		$view		= './app/view/'. $class . '.php';
		include_once($controller) ;
		include_once($model) ;
		include_once($view) ;
	}

	// Controller instanziieren
	$controller = new Controller(); 

	if(@$_SESSION['usersid']) {
		// Benutzerauthentifizierung zwischenspeichern
		$validuser = true;
	}

	if(isset($validuser)) {
		// Nur wenn Benutzer angemeldet ist...
		if($action == 'view') {
			// z.B. ?controller=index&action=view
			echo $controller->displayData($id);
		} else if($action == 'detail') {
			// z.B. ?controller=index&action=detail&id=1
			echo $controller->displayDetails($id);
		} else if($action == 'delete') {
			// z.B. ?controller=index&action=delete&id=1
			$controller->deleteData($id);
			echo $controller->displayData($id);
		} else if($action == 'insert') {
			// z.B. ?controller=index&action=insert
			$controller->insertData();
		} else if($action == 'load') {
			// z.B. ?controller=index&action=load
			echo $controller->loadData(); 
		} else if($action == 'send') {
			// z.B. ?controller=index&action=send
			echo $controller->formValidation();
		} else {
			echo $controller->loadData(); 
		}
	} else {
		//echo $controller->displayPublicData(); 
		echo $controller->displayData($id);
	}
	//echo $controller->displayData($id);
?>