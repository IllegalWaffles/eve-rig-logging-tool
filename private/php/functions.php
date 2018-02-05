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
			if($val < 0)
				return false;
		
		return true;
		
	}
	
	function calculate_raw_cost_per_shield($stats){
		global $ARMOR_QUANTS;
		global $SHIELD_QUANTS;
		
		$costPerShield =  ($stats['enhanced_ward_console'] * $SHIELD_QUANTS['enhanced_ward_console']);
		$costPerShield += ($stats['logic_circuit'] * $SHIELD_QUANTS['logic_circuit']);
		$costPerShield += ($stats['power_circuit'] * $SHIELD_QUANTS['power_circuit']);
		
		return $costPerShield;
		
	}
	
	function calculate_profit_for_record($stats){
		global $ARMOR_QUANTS;
		global $SHIELD_QUANTS;
		
		$costPerArmor =  ($stats['intact_armor_plates'] * $ARMOR_QUANTS['intact_armor_plates']);
		$costPerArmor += ($stats['nanite_compound'] * $ARMOR_QUANTS['nanite_compound']);
		$costPerArmor += ($stats['interface_circuit'] * $ARMOR_QUANTS['interface_circuit']);
		
		//echo 'DEBUG: Cost per armor: ' . fmt($costPerArmor);
		
		$costPerShield =  ($stats['enhanced_ward_console'] * $SHIELD_QUANTS['enhanced_ward_console']);
		$costPerShield += ($stats['logic_circuit'] * $SHIELD_QUANTS['logic_circuit']);
		$costPerShield += ($stats['power_circuit'] * $SHIELD_QUANTS['power_circuit']);
		
		//echo '<br>DEBUG: Cost per shield: ' . fmt($costPerShield);
		
		$totalCost = ($costPerArmor * $stats['armor_quant']) + ($costPerShield * $stats['shield_quant']);
		
		//echo '<br>DEBUG: Total cost: ' . fmt($totalCost);
		
		$totalCost *= 1 + $stats['tax'] * 1.1;
		
		//echo '<br>DEBUG: Total cost (with tax): ' . fmt($totalCost);
		
		$revenuePerArmor = $stats['armor_price'];
		$revenuePerShield = $stats['shield_price'];
		
		//echo '<br>DEBUG: Revenue per armor: ' . fmt($revenuePerArmor);
		//echo '<br>DEBUG: Revenue per shield: ' . fmt($revenuePerShield);
		
		$totalRevenue = ($revenuePerArmor * $stats['armor_quant']) + ($revenuePerShield * $stats['shield_quant']);
		
		//echo SALES_TAX . ':' . (1 - SALES_TAX) . ':' . $totalRevenue . '<br>';
		
		$totalRevenue *= (1 - SALES_TAX);
		
		//echo $totalRevenue . ':' . $totalCost . '<br><br>';
		
		$profit = $totalRevenue - $totalCost;

		return $profit;
		
	}
	
	function insert_into_db($stats){
		global $db;
		
		$date = date('Y-m-d H:i:s');
				
		$sql =  'INSERT INTO rig_log ';
		$sql .= '(date_completed, intact_armor_plates, nanite_compound, interface_circuit, power_circuit, logic_circuit, enhanced_ward_console, ';
		$sql .= 'shield_quant, shield_price, armor_quant, armor_price, tax, completed)';
		$sql .= ' VALUES ';
		$sql .= '(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
		$sql = $db->prepare($sql);
		
		$sql->bind_param('sddddddididdi', 
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
			$stats['tax'],
			$stats['completed']
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
	
	function get_log_by_ID($id){
		global $db;
		
		$sql = 'SELECT * FROM rig_log WHERE id=' . $id . ';';
		$result = $db->query($sql);
		
		if(!$result)
			exit('Getting record by ID failed.');
		
		return $result;
		
	}

	function delete_log_by_ID($id){
		global $db;
	
		$sql = 'DELETE FROM rig_log WHERE id=' . $id . ';';
		$result = $db->query($sql);

		if(!$result)
			exit('Deleting record by ID failed.');


	}
	
	function update_record($record){
		global $db;
		
		$sql =  'UPDATE rig_log SET ';
		$sql .= 'intact_armor_plates = ?, nanite_compound = ?, interface_circuit = ?, ';
		$sql .= 'power_circuit = ?, logic_circuit = ?, enhanced_ward_console = ?, ';
		$sql .= 'shield_quant = ?, shield_price = ?, armor_quant = ?, armor_price = ?, ';
		$sql .= 'tax = ?, completed= ? ';
		$sql .= 'WHERE id = ? ';
		$sql .= 'LIMIT 1;';
		
		$sql = $db->prepare($sql);
		
		
		$sql->bind_param('ddddddididdii',
						 $record['intact_armor_plates'],
						 $record['nanite_compound'],
						 $record['interface_circuit'],
						 $record['power_circuit'],
						 $record['logic_circuit'],
						 $record['enhanced_ward_console'],
						 $record['shield_quant'],
						 $record['shield_price'],
						 $record['armor_quant'],
						 $record['armor_price'],
						 $record['tax'],
						 $record['completed'],
						 $record['id']); 
						 
		$result = $sql->execute();
		
		if(!$result){
			
			echo db_error($db);
			db_close($db);
			exit;
			
		}
		
		
	}
	
?>
