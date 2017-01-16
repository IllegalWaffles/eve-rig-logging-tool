<?php

	require_once("../private/init.php");

	$log = get_all_logs();
	$table_output = array();
	
	$submitted = isset($_POST['submit']);
	
	$total_cycles = 0;
	$total_runs = 	0;
	$max_profit = 	0;
	$avg_profit =	0;
	$total_profit =	0;
	
?>

<html>
<head><link rel="stylesheet" type="text/css" href = "../private/style.css"></head>
<body>

	<a href="index.php">Back to Logging Tool</a><br>
	<div id="header">Statistics</div>
	
	<?php 
	
		if($log->num_rows != 0) {
	
	
			while($row = $log->fetch_assoc()) {
				
				$profit = calculate_profit_for_record($row);
				
				$total_profit += $profit;
				++$total_cycles;
				$max_profit = $profit > $max_profit?$profit:$max_profit;
				$total_runs += $row['armor_quant'] + $row['shield_quant'];
				
				// Store output for later
				$string = '<tr>';
				
				//$string .= '<td id="td_border">' . $row['id'] . '</td>';
				$string .= '<td id="td_border">' . $row['date_completed'] . '</td>';
				$string .= '<td id="td_border">' . $row['armor_quant'] . '</td>';
				$string .= '<td id="td_border">' . $row['shield_quant'] . '</td>';
				$string .= '<td id="td_border">' . $row['tax'] . '</td>';
				$string .= '<td id="td_border">' . fmt($profit) . '</td>';
				
				$string .= '</tr>';
				
				$table_output[] = $string;
				
			}
		
			$log->free();
		
			$avg_profit = $total_profit / $total_cycles;
		
		}
		else
		{
			
			echo 'No data found. Add some records and try again.';
			$log->free();
			
		}
	
	?>
	
	Total cycles: <?php echo isset($total_cycles)?$total_cycles:'Var unset'; ?><br>
	Total runs: <?php echo isset($total_runs)?$total_runs:'Var unset'; ?><br>
	Highest profit: <?php echo isset($max_profit)?fmt($max_profit):'Var unset'; ?><br>
	Average profit: <?php echo isset($avg_profit)?fmt($avg_profit):'Var unset'; ?><br>
	Total profit: <?php echo isset($total_profit)?fmt($total_profit):'Var unset'; ?><br>
	
	<br>
	
	<?php
	
		if($submitted){
				
			echo 'All records: <br>';
				
			//Print the entire records table
			echo '<table id="table_border">';
				echo '<tr>';
					
					//echo '<th id="td_border">ID</th>';
					echo '<th id="td_border">Timestamp</th>';
					echo '<th id="td_border">Armor Quant</th>';
					echo '<th id="td_border">Shield Quant</th>';
					echo '<th id="td_border">Tax %</th>';
					echo '<th id="td_border">Profits</th>';
					
				echo '</tr>';
			
				// Print each record row
				foreach($table_output as $val)
					echo $val;
			
			echo '</table>';
			echo '<br>';
			
		}
	?>
	
	<form action="stats.php" method="post">
	<input type="submit" name="submit" value="Show all records">
	</form>
	
</body>
</html>

<?php if(isset($db))db_close($db);?>