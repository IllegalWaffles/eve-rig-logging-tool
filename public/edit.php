<?php

	require_once("../private/php/init.php");

	$selected = isset($_POST['select']);
	$submitted = isset($_POST['submit']);
	
	$records = get_all_logs();
	
	$record;
	
	if($selected) {
		
		$id_to_get = isset($_POST['record_id'])?$_POST['record_id']:0;
		$record = get_log_by_ID($id_to_get)->fetch_assoc();
		
	}
	else if($submitted) {
		
		// Alter the record as needed
		if(!isset($_GET['id']))
			header('Location: index.php');
			
		$id = $_GET['id'];
		
	}
	
?>

<html>
<head><link rel="stylesheet" type="text/css" href = "../private/style/style.css"></head>
<body>

	<form action="edit.php" method="post">
			
		<?php
		
		if($records->num_rows <= 0)
			echo 'No records found.';
		else {
			
			echo '<select name=\'record_id\'>';
			
			while($row=$records->fetch_assoc())
				echo "\n\t\t\t" . '<option value=' . $row['id'] . '>'. $row['date_completed'] .'</option>';

			
			echo "\n\t\t" . '</select>';
	
		}
	
		?>
		<input type="submit" name="select" value="Edit this record">
	
		<?php if($selected) { ?>
		
			<form action="edit.php?id=<?php echo $record['id']; ?>" method="post">
			
				<table>
		
					<tr>
						<td id="secondary_header">Material Prices:</td>
					</tr>
					<tr>
						<td>Mat 1 (Plates): </td> <td><input type="number" step=0.01 name="plates" value=<?php echo $record['intact_armor_plates']; ?>></td>
						<td>Mat 2 (Nanite): </td> <td><input type="number" step=0.01 name="nanite" value=<?php echo $record['nanite_compound']; ?>></td>
						<td>Mat 3 (Interf): </td> <td><input type="number" step=0.01 name="interf" value=<?php echo $record['interface_circuit']; ?>></td>
					</tr>
					<tr>
						<td>Mat 4 (PowerC): </td> <td><input type="number" step=0.01 name="powerc" value=<?php echo $record['power_circuit']; ?>></td>
						<td>Mat 5 (LogicC): </td> <td><input type="number" step=0.01 name="logicc" value=<?php echo $record['logic_circuit']; ?>></td>
						<td>Mat 6 (Consol): </td> <td><input type="number" step=0.01 name="consol" value=<?php echo $record['enhanced_ward_console']; ?>></td>
					</tr>
					<tr>
						<td>Station tax: </td><td><input type="number" step=0.01 name="tax" value=<?php echo $record['tax']; ?>></td>
				
		
				</table>
			
				<table>
				
					<tr>
						<td id="secondary_header">Product prices and quantities:</td>
					</tr>
					<tr>
						<td>Shield quantity: <input type="number" name="shield_quant" value=<?php echo $record['shield_quant']; ?>></td>
						<td>Shield price: <input type="number" step=0.01 name="shield_price" value=<?php echo $record['shield_price']; ?>></td>
					</tr>
					<tr>
						<td>Armor quantity: <input type="number" name="armor_quant" value=<?php echo $record['armor_quant']; ?>></td>
						<td>Armor price: <input type="number" step= 0.01 name="armor_price" value=<?php echo $record['armor_price']; ?>></td>
					</tr>
			
				</table>
				
				<input type="submit" name="submit" value="Submit edits">
			
			</form>
			
		
		<?php } ?>
	
	</form>


<a href="index.php">Back to index</a>
</body>
</html>

<?php if(isset($db))db_close($db);?>