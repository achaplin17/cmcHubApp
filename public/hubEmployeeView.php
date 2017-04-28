<!DOCTYPE html>

<?php 

include ('dbconn.php');


$dbc = connectToDB("iHub");
$query = "SELECT * FROM Orders";
		
	echo "<table class=\"table table-bordered table-striped table-hover\">
				<thead class=\"bg-danger\">
				<tr>
					<th class=\"id\">id</th>
					<th class=\"cmc_id\">CMC ID</th>
					<th class=\"payment_type\">Payment Type</th>
					<th class=\"order_date\">Order Date</th>
					<th class=\"number_of_items\">Number of Items</th>
					<th class=\"total_order_price\">Total Order Price</th>
				</tr>
				</thead>";

$result = performQuery($dbc, $query);


				echo "<tbody>";

				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

					// If you want to display all results from the query at once:
   					// print_r($row);


					// If you want to display the results one by one
					echo "<tr>";
                    	echo "<td>";
                   			echo $row['id'];
                    	echo "</td>";
                    	echo "<td>";
                   			echo $row['cmc_id']; 
                    	echo "</td>";
                    	echo "<td>";
                   			echo $row['payment_type'];
                    	echo "</td>";
                    	echo "<td>";
                   			echo $row['order_date'];
                    	echo "</td>";
                    	echo "<td>";
                   			echo $row['number_of_items'];
                    	echo "</td>";
                    	echo "<td>";
                   			echo $row['total_order_price'];
                    	echo "</td>";
                    echo "</tr>";
				}
			
			echo "</tbody>
				</table>";



//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

disconnectFromDB($dbc, $result);

?>

<html lang="en">

<head>
	<link rel = "stylesheet" href="finalmenu.css">
	<title>OrderHub_EmployeeView</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/6aabf1bd39.js"></script>
</head>

<body>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
</body>

</html>