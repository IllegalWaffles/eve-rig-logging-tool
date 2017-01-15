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
	
	function calculate_profit_for_record($stats){
		
		$costPerArmor =  ($stats['intact_armor_plates'] * $ARMOR_QUANTS['intact_armor_plates']);
		$costPerArmor += ($stats['nanite_compound'] * $ARMOR_QUANTS['nanite_compound']);
		$costPerArmor += ($stats['interface_circuit'] * $ARMOR_QUANTS['interface_circuit']);
		
		$costPerShield =  ($stats['enhanced_ward_console'] * $SHIELD_QUANTS['enhanced_ward_console']);
		$costPerShield += ($stats['logic_circuit'] * $SHIELD_QUANTS['logic_circuit']);
		$costPerShield += ($stats['power_circuit'] * $SHIELD_QUANTS['power_circuit']);
		
		$totalCost = ($costPerArmor * $stats['armor_quant']) + ($costPerShield * $stats['shield_quant']);
		
		$revenuePerArmor = $stats['armor_price'];
		$revenuePerShield = $stats['shield_price'];
		
		$totalRevenue = ($revenuePerArmor * $stats['armor_quant']) + ($revenuePerShield * $stats['shield_quant']);
		
		$profit = $totalRevenue - $totalCost;

		return $profit;
		
	}
	
?>