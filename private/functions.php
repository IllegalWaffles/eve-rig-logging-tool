<?php 

	// Application-wide functions defined here
	function ht($string=""){
		htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	}
	
	function h($string=""){
		htmlspecialchars($string);
	}
	
	function u($string=""){
		rawurlencode($string);
	}

	function get_post($post_value, $submitted_value){
		return isset($_POST[$post_value]) && $submitted_value?$_POST[$post_value]:0;
	}
	
	function validate_stats($statarray) {
		
		foreach ($statarray as $val)
			if($val <= 0)
				return false;
		
		return true;
		
	}
	
?>