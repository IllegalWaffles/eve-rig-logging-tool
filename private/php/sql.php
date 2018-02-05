<?php

	// database credentials and general sql functions will be kept here
	define("DB_SERVER", "localhost");
	define("DB_USER", "kgas");
	define("DB_PASS", "Kgas123");
	define("DB_NAME", "kgas_database");
	
	function db_connect() {
		
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		
		if(mysqli_connect_errno()) {
			
			$msg = "Database connection failed: ";
			$msg .= mysqli_connect_error();
			$msg .= " (" . mysqli_connect_errno() . ")";
			exit($msg);
			
		}
		
		return $connection;
	
	}

	function db_close($connection) {
		return mysqli_close($connection);
	}

	
  
?>
