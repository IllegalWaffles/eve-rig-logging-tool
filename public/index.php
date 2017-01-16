<?php 

	require_once("../private/init.php");
	
	$submitted = $_SERVER['REQUEST_METHOD'] == 'POST';
	$error = false;
	
	$stats = array(
		'intact_armor_plates' => 	(isset($_POST['plates']) && $submitted?$_POST['plates']:0),
		'nanite_compound' =>		(isset($_POST['nanite']) && $submitted?$_POST['nanite']:0),
		'interface_circuit' => 		(isset($_POST['interf']) && $submitted?$_POST['interf']:0),
		'power_circuit' => 			(isset($_POST['powerc']) && $submitted?$_POST['powerc']:0),
		'logic_circuit' => 			(isset($_POST['logicc']) && $submitted?$_POST['logicc']:0),
		'enhanced_ward_console' => 	(isset($_POST['consol']) && $submitted?$_POST['consol']:0),
		'shield_quant' => 			(isset($_POST['shield_quant']) && $submitted?$_POST['shield_quant']:0),
		'shield_price' => 			(isset($_POST['shield_price']) && $submitted?$_POST['shield_price']:0),
		'armor_quant' => 			(isset($_POST['armor_quant']) && $submitted?$_POST['armor_quant']:0),
		'armor_price' => 			(isset($_POST['armor_price']) && $submitted?$_POST['armor_price']:0),
		'tax' => 					(isset($_POST['tax']) && $submitted?$_POST['tax']:0)
	);
	
	if($submitted){
		
		$error = !validate_stats($stats);
		
		if(!$error){
			//No errors. Proceed
			insert_into_db($stats);
			
		}
		
	}
	
?>

<html>
<head><link rel="stylesheet" type="text/css" href = "../private/style.css"></head>
<body>

	<form action="index.php" method="post" id="main_form">

		<div id="header">Rig Logging Tool</div>
		<br>
		
		<table>
		
			<tr>
				<td id="secondary_header">Material Prices:</td>
			</tr>
			<tr>
				<td>Mat 1 (Plates): </td> <td><input type="number" step=0.01 name="plates" value=<?php echo isset($stats['intact_armor_plates'])?$stats['intact_armor_plates']:0.0; ?>></td>
				<td>Mat 2 (Nanite): </td> <td><input type="number" step=0.01 name="nanite" value=<?php echo isset($stats['nanite_compound'])?$stats['nanite_compound']:0.0; ?>></td>
				<td>Mat 3 (Interf): </td> <td><input type="number" step=0.01 name="interf" value=<?php echo isset($stats['interface_circuit'])?$stats['interface_circuit']:0.0; ?>></td>
			</tr>
			<tr>
				<td>Mat 4 (PowerC): </td> <td><input type="number" step=0.01 name="powerc" value=<?php echo isset($stats['power_circuit'])?$stats['power_circuit']:0.0; ?>></td>
				<td>Mat 5 (LogicC): </td> <td><input type="number" step=0.01 name="logicc" value=<?php echo isset($stats['logic_circuit'])?$stats['logic_circuit']:0.0; ?>></td>
				<td>Mat 6 (Consol): </td> <td><input type="number" step=0.01 name="consol" value=<?php echo isset($stats['enhanced_ward_console'])?$stats['enhanced_ward_console']:0.0; ?>></td>
			</tr>
			<tr>
				<td>Station tax: </td><td><input type="number" step=0.01 name="tax" value=<?php echo isset($stats['tax'])?$stats['tax']:0.0;?>></td>
		
	
		</table>
	
		<div id="note">Material quantities are automatically calculated using preset values.</div>
		<br>
	
		<table>
		
			<tr>
				<td id="secondary_header">Product prices and quantities:</td>
			</tr>
			<tr>
				<td>Shield quantity: <input type="number" name="shield_quant" value=<?php echo isset($stats['shield_quant'])?$stats['shield_quant']:0; ?>></td>
				<td>Shield price: <input type="number" step=0.01 name="shield_price" value=<?php echo isset($stats['shield_price'])?$stats['shield_price']:0.0; ?>></td>
			</tr>
			<tr>
				<td>Armor quantity: <input type="number" name="armor_quant" value=<?php echo isset($stats['armor_quant'])?$stats['armor_quant']:0; ?>></td>
				<td>Armor price: <input type="number" step= 0.01 name="armor_price" value=<?php echo isset($stats['armor_price'])?$stats['armor_price']:0.0; ?>></td>
			</tr>
	
		</table>
		<br>
		<div id="note">Date and time will be recorded on pressing the submit button.</div>
	
		<br>
		<input type="submit" name="submit" value="Submit">
	
	</form>

	<?php 
	
		if($submitted && !$error){
		
			echo '<br>';
			echo '<div id="secondary_header">';
			echo 'Values submitted.';
			echo '</div>';
	
		}
	
	?>
	
	<a href="stats.php">See the stats</a><br>
	
	<?php 
		if($error){
		
			echo "<br>";
			echo "<div id=\"note\">";
			echo "Error:<br>";
			echo "Some value is invalid. Recheck inputs.";
			echo "</div>";
			
		} 
	?>
	
</body>
</html>

<?php if(isset($db))db_close($db);?>