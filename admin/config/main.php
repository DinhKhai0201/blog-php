<?php

session_start();

// Config global constant variable
define('RootURL', 'http://'.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/');
$URI=dirname($_SERVER['SCRIPT_FILENAME']);
$URI=substr_replace($URI ,"",-6);
define('RootURI',$URI);

// Config for database
define('DB_HOST','localhost');
define('DB_USER','phpmyadmin');
define('DB_PASSWORD','chin2701');
define('DB_NAME','mangxh');

// Global variables
$app = [];
$mediaFiles = [
	'css'	=>	[],
	'js'	=>	[]
];
$obMediaFiles = $mediaFiles;
//define('OB',true);
$enableOB = true;

?>
