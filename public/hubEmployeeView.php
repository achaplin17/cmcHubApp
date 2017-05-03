<?php 
include ('dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

	
	<!-- DEVELOPER CSS LINKS -->
	<link rel = "stylesheet" href="finalmenu.css">

	<title>OrderHub_EmployeeView</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- BOOTSTRAP -->
		

		<!-- CHECK THIS FOR LOCAL BOOTSTRAP LINKING -->
		<!-- Latest compiled and minified CSS -->
		<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

	<!-- BOOTSTRAP -->
		<!-- Javascript CDN -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- CHECK THIS FOR FONT NEEDS -->
	<script src="https://use.fontawesome.com/6aabf1bd39.js"></script>
</head>


<body>
	<div class="container">
		<div class="jumbotron">
	  		<h1>CMC HUB<small>ADMIN USER</small></h1>
		</div>
	</div>

  	<div class="container">

		<?php

			// pagination support
			$itemsPerPage=7;
			
			// figure out how many pages
			$pages = findpages($itemsPerPage);
			$start = findstart();
				
			
			createDataTable($start, $itemsPerPage);
			createPageLinks($start, $pages, $itemsPerPage);
		?>
  	</div>
  	<a href="mainLogin.php">HOME PAGE</a>
</body>
</html>

<?php

function createDataTable($start, $itemsPerPage){

	$query = "SELECT * FROM Orders LIMIT $start, $itemsPerPage";
				
				

	echo "<div class=\"panel panel-default\">
  			<!-- Default panel contents -->
  			<div class=\"panel-heading\">Order Submission Dashboard</div>
  			<div class=\"panel-body\">
			</div>
		
			<table class=\"table table-bordered table-striped table-hover\">
				<thead class=\"bg-danger\">
					<tr>
						<th class=\"id\">id</th>
						<th class=\"cmc_id\">CMC ID</th>
						<th class=\"payment_type\">Payment Type</th>
						<th class=\"order_date\">Order Date</th>
						<th class=\"number_of_items\">Number of Items</th>
						<th class=\"total_order_price\">Total Order Price</th>
					</tr>
				</thead>\n";

	$dbc = connectToDB("iHub");
	$result = performQuery($dbc, $query);

				echo "<tbody>";

				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

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
				</table>
			</div>\n";
}

function findpages($itemsPerPage){
	if (isset($_GET['p'])){
		// get it from the URL if we've already been here
		$pages=$_GET['p'];
	} else {
	
		// starting new, so get it from the database
		$query="SELECT COUNT(id) as count from Orders;";
		
		$dbc = connectToDB("iHub");
		$result = performQuery($dbc, $query);
		extract((array)mysqli_fetch_array($result, MYSQLI_ASSOC));
			
		if ($count > $itemsPerPage)
			$pages=ceil($count/$itemsPerPage);
		else
			$pages=1;
	}
	return $pages;
}


function findstart(){
    // figure out where to start
	if (isset($_GET['s']))
		$start=$_GET['s'];
	else
		$start=0; // at the beginning
		
 	return($start);
}


function createPageLinks($start, $pages, $itemsPerPage){
	
	// creating page links
	if ( $pages > 1 ) {
		
		// print Previous if not on the first page
		$currentPage = ( $start / $itemsPerPage ) + 1;
		if ($currentPage != 1){
			echo '<a href="hubEmployeeView.php?s='.($start - $itemsPerPage) . 
														'&amp;p=' . $pages . '"> Previous </a>';
		}
		
		// print page numbers
		for ($i=1; $i <= $pages; $i++) {
				if ($i != $currentPage) {
					echo '<a href="hubEmployeeView.php?s='. (( $itemsPerPage * ( $i - 1 ))) . 
												'&amp;p=' . $pages . '"> '. $i .'  </a>'."\n";
				}  else {
					echo $i . ' ';
				}
		}
	
		// print next if not on the last page
		if ( $currentPage != $pages ){
			echo '<a href="hubEmployeeView.php?s='. ($start + $itemsPerPage) . '&amp;p=' . 
												$pages . '"> Next </a>';
		}
	}
}





//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

// disconnectFromDB($dbc, $result);

?>




	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 


