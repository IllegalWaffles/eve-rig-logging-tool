<?php
	
	// Initialization script
	
	require_once('sql.php');
	require_once('functions.php');
	require_once('data.php');

	define('CSS_PATH', '../private/style/css');
	define('STYLESHEET', CSS_PATH.'/style.css');	

	$db = db_connect();

?>
