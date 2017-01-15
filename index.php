<?php 

	require_once("./private/init.php");
	
	$submitted = isset($_POST['submit']);
	
	$shield_quants = array(
		// TODO
	);
	
	$armor_quants = array(
		// TODO
	);
	
	if($submitted){
		
		
		
	}
	

?>

<html>
<head><link rel="stylesheet" type="text/css" href = "./style.css"></head>
<body>

	<form action="index.php" method="post">

		<div id="header">Rig Logging Tool</div>
		<br>
		
		<table>
		
			<tr>
				<td id="secondary_header">Material Prices:</td>
			</tr>
		
			<tr>
				<td>Mat 1 (Plates): </td> <td><input type="number" step=0.01 name="plates" value=0.0></td>
				<td>Mat 2 (Nanite): </td> <td><input type="number" step=0.01 name="nanite" value=0.0></td>
				<td>Mat 3 (Interf): </td> <td><input type="number" step=0.01 name="interf" value=0.0></td>
			</tr>
			
			<tr>
				<td>Mat 4 (PowerC): </td> <td><input type="number" step=0.01 name="powerc" value=0.0></td>
				<td>Mat 5 (LogicC): </td> <td><input type="number" step=0.01 name="logicc" value=0.0></td>
				<td>Mat 6 (Consol): </td> <td><input type="number" step=0.01 name="consol" value=0.0></td>
			<tr>
	
		</table>
	
		<div id="note">Material quantities are automatically calculated using preset values.</div>
	
		<br>
	
		<table>
		
			<tr>
				<td id="secondary_header">Product prices and quantities:</td>
			</tr>
	
			<tr>
			
				<td>Shield quantity: <input type="number" name="shield_quant" value=0></td>
				<td>Shield price: <input type="number" step=0.01 name="shield_price" value=0.0></td>
			
			</tr>
				
			<tr>
				
				<td>Armor quantity: <input type="number" name="armor_quant" value=0></td>
				<td>Armor price: <input type="number" step= 0.01 name="armor_price" value=0.0></td>
			
			</tr>
	
		</table>
		<br>
		<div id="note">Date and time will be recorded on pressing the submit button.</div>
	
		<br>
		<input type="submit" name="submit" value="Submit">
	
	</form>

</body>
</html>

<?php if(isset($db))db_close($db);?>