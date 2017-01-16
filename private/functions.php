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
	
	function fmt($value){
		return number_format($value, 2, '.', ' ');
	}
	
	function validate_stats($statarray) {
		
		foreach ($statarray as $val)
			if($val <= 0)
				return false;
		
		return true;
		
	}
	
	function calculate_profit_for_record($stats){
		global $ARMOR_QUANTS;
		global $SHIELD_QUANTS;
		
		$costPerArmor =  ($stats['intact_armor_plates'] * $ARMOR_QUANTS['intact_armor_plates']);
		$costPerArmor += ($stats['nanite_compound'] * $ARMOR_QUANTS['nanite_compound']);
		$costPerArmor += ($stats['interface_circuit'] * $ARMOR_QUANTS['interface_circuit']);
		
		$costPerShield =  ($stats['enhanced_ward_console'] * $SHIELD_QUANTS['enhanced_ward_console']);
		$costPerShield += ($stats['logic_circuit'] * $SHIELD_QUANTS['logic_circuit']);
		$costPerShield += ($stats['power_circuit'] * $SHIELD_QUANTS['power_circuit']);
		
		$totalCost = ($costPerArmor * $stats['armor_quant']) + ($costPerShield * $stats['shield_quant']);
		
		// Include tax in calculation
		$totalCost = $totalCost * (1 + ($stats['tax'] * 1.1));
		
		$revenuePerArmor = $stats['armor_price'];
		$revenuePerShield = $stats['shield_price'];
		
		$totalRevenue = ($revenuePerArmor * $stats['armor_quant']) + ($revenuePerShield * $stats['shield_quant']);
		
		$profit = $totalRevenue - $totalCost;

		return $profit;
		
	}
	
	function insert_into_db($stats){
		global $db;
		
		$date = date('Y-m-d H:i:s');
				
		$sql =  'INSERT INTO rig_log ';
		$sql .= '(date_completed, intact_armor_plates, nanite_compound, interface_circuit, power_circuit, logic_circuit, enhanced_ward_console, ';
		$sql .= 'shield_quant, shield_price, armor_quant, armor_price, tax)';
		$sql .= ' VALUES ';
		$sql .= '(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
		$sql = $db->prepare($sql);
		
		$sql->bind_param('sddddddididd', 
			$date, 
			$stats['intact_armor_plates'],
			$stats['nanite_compound'],
			$stats['interface_circuit'],
			$stats['power_circuit'],
			$stats['logic_circuit'],
			$stats['enhanced_ward_console'],
			$stats['shield_quant'],
			$stats['shield_price'],
			$stats['armor_quant'],
			$stats['armor_price'],
			$stats['tax']
			);
		
		$result = $sql->execute();
		
		if(!$result){
			
			echo db_error($db);
			db_close($db);
			exit;
			
		}
		
	}
	
	function get_all_logs(){
		global $db;
		
		$sql = 'SELECT * FROM rig_log ORDER BY id asc;';
		$result = $db->query($sql);
		
		if(!$result)
			exit('SELECT query failed.');
		
		return $result;
		
	}
	
?>