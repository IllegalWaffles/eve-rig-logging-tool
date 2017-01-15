<?php 

	// Application-wide functions defined here
	function ht($string=""){
		
		htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
		
	}
	
	function u($string=""){
		
		rawurlencode($string);
		
	}

?>