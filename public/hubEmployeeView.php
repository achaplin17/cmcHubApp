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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="startbootstrap-modern-business-gh-pages/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="startbootstrap-modern-business-gh-pages/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="startbootstrap-modern-business-gh-pages/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!--    Linking CSS files from shopping cart template (index.html) -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="shoppingCartTemplate/assets/css/custom.css"/>  

    <!-- Linking files for quantity button in modal -->
    <script src="quantityButton/quantityButton.js"></script>
    <link rel="stylesheet" type="text/css" href="quantityButton/quantityButton.css"/>
</head>


<body>

 <!-- ******************* HOME PAGE TEMPLATE CODE ******************* -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background-color: white; opacity: 0.5;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">OrderHub</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="mainLogin.php#about">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="mainLogin.php#services">How it Works</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="mainLogin.php#contact">Contact</a>
                    </li>
                    <li>
                        <a href="hubEmployeeView.php">Employees</a>
                    </li>

                    <!-- <a href="mainLogin.php">HOME PAGE</a> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



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
</body>
</html>

<?php

function createDataTable($start, $itemsPerPage){

	$query = "SELECT id,cmc_id,payment_type,order_date,number_of_items FROM Orders LIMIT $start, $itemsPerPage";
				
				

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


