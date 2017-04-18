<?php 

require "../application/cart.php";
require "../application/item.php";
session_start(); 
?>

<!DOCTYPE html>

<?php

//print_r($_SESSION['hubCart']);


if (!isset($_SESSION['hubCart'])) {
    $_SESSION['hubCart'] = new Cart();


}


// foreach (cart::$toppingsArr as $key) {
// 	//print_r(" ". $key);
// 	foreach ($_POST as $toppingsAdded) {
// 		if ($toppingsAdded = $key) {
// 			//print_r($key);
// 		}
// 	}

// }


// foreach (cart::$toppingsArr as $key) {
// 	print_r(" ". $key);
// 	if (in_array($key, $_POST)) {
// 		//print_r($key);
// 	}

// }

// foreach ($_POST as $key) {
// 	$key = explode('t-'.$key);

// }
// $search = "t-";
// $search_length = strlen($search);
// foreach ($_POST as $key => $value) {
// 	if (substr($key, 0, $search_length) == $search) {
// 		print_r($value);
// 	}
// }


//print_r($_POST);



 if ($_POST["item"]) {
 	    $toppings = array();
 		$item = $_POST["item"];
		foreach ($_POST as $key => $value) {
			$exp_key = explode('-', $key);
			if ($exp_key[0] == 't'){
				array_push($toppings, $value);
			}
		}
	

	//echo "---"; print_r($_SESSION['hubCart']); echo "--<br><br>";
	$_SESSION['hubCart']->orderAddToCart($item, $toppings); 
	//echo "---"; print_r($_SESSION['hubCart']); echo "--";
 	

 }




//print_r($_POST);


// if ($_POST["foo"]) {
// 		if ($item && is_numeric($quantity) && $quantity > 0) {
// 			$_SESSION['hubCart']->order($item, $quantity); //DON'T FORGET TO ADD MESSAGE IN MODAL IF QUANTITY IS NOT NUMBER OR LESS THAN 0!!!!
		
			//unset($_POST["item"]);
			//echo("added ". $quantity);

			//echo("added ". $item);
		
// 		}
// }

//$toppingsAdded = array('coffee');



//for each item selected in the i.e. sandwich form
	//add item to array $topingsAdded
	//then call $_SESSION['hubCart']->order($item, $quantity, $topingsAdded ); //but need to modify order method first

?>



<html lang="en">

<head>
	<link rel = "stylesheet" type="text/css" href="finalmenu.css">
	<title>OrderHubLogin4</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/6aabf1bd39.js"></script>
</head>


<body>



	<div class="d-flex">
		<h2>OrderHub</h2>
	</div>
	<div class = "flex-container">
		<div class="menu-body d-flex justify-content-start" id = "menuContainer"> 

		   <!-- |||||||Section starts: ENTREES ||||||||||||||||| -->
		    <div class="menu-section d-flex">
		        <h2 class="menu-section-title">ENTREES</h2>

		        <!-- Item starts -->

		        <div class="menu-item" id="sandwich" data-target="#myModal" data-toggle="modal"> <!-- data-href="viewcart.php" -->
		         	<div class="menu-item-name">
		         		Sandwich
		         	</div>
		         	<div class="menu-item-price">
		            	$5
		         	</div>
		         	<div class="menu-item-description">
		            	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.
		        	</div>
		      	</div>
		      	<!-- Item ends -->

		      	<!-- Item starts -->
		        <div class="menu-item" id="salad" data-target="#myModal" data-toggle="modal"> <!-- data-href="viewcart.php" -->
		         	<div class="menu-item-name">
		         		Salad
		         	</div>
		         	<div class="menu-item-price">
		            	$6
		         	</div>
		         	<div class="menu-item-description">
		            	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.
		        	</div>
		      	</div>
		      	<!-- Item ends -->

		    </div>
		   <!-- Section Ends: ENTREES -->
		</div>

		<div class = "section d-inline-flex" id = "section">
			<h2 id="cartTitle">Cart</h2>
		</div>
	</div>


   



	<!-- ***************** START OF MODAL ******************* -->
	<form method = "POST">
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		    <!-- Modal content-->

		    <div class="modal-content">
		     <!-- <input type="text" id="quantity" name="quantity" required>Quantity</input> -->
			    <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal">&times;</button>
				    
				    <input class = "modal-title" name="item" type = "hidden"></input>
				    
				    
				    <h3 class="item-price"></h3>
			    </div>
		      <div class="modal-body">
		      </div>
		      	<div class="modal-footer">
		        	<input type="submit" 
		        	name = "foo" value = "addCart" class="btn btn-lg btn-primary">
		      	</div>
		    </div>
		</div>
	</div>
	</form>
	<!-- ***************** END OF MODAL ******************* -->

	

	<!-- ***************** Sample Shopping Cart ******************* -->


	<h3>Our Shopping Cart</h3>

	<table class="table table-bordered">
	<thead>
  		<tr>
  			<th>#</th>
  			<th>Item</th>
  			<th>Toppings</th>
  		</tr>
  	</thead>
  	<tbody>
			<?php
			 //echo "<tr></tr>";
				$orderArray = $_SESSION['hubCart']->getOrder();

				$counter = 0;
				while ($i = current($orderArray)) {

					echo "<tr>";
					echo "<td>";

					echo $counter;
				
					echo "</td>";
						echo "<td>";
						echo $i->getItemName(); 
						echo "</td>";

						$toppings = $i->getToppings();
						foreach ($toppings as $key => $value) {
						 	echo "<td>" .$value. " </td>";
					 	}			 	
					next($orderArray);
					echo "</tr>";
					$counter++;
				}
			?>   
     </tbody>	
	</table>

<form action='checkout.php'>
    <input type="submit" value="Checkout" />
</form>



<!-- Script for making menu-item div clickable and for linking to modal -->


	<script type="text/javascript">


		// iterate through each menu-section, find each menu-item, and bind the on-click function to that menu-item. then assign the id of the menu-item to a variable. pass the variable in to the showModal method.
		$('.menu-section').each(function(){
		 	$(this).find(".menu-item").each(function(){
	     		$(this).on( 'click', function () {
	      			var id  = $(this).attr("id");
	      			showModal(id);
	   			});
	  		});
		});

		// receive the id passed in from the above script. simple switch case to test the string value of the id, then assign a variable with the correct file name to finally be used for retrieving proper data to show in the modal. 
		
	function showModal(id) {

			 // $(".modal-title").html(id);
			 $(".modal-title").val(id);


			
			var fileName;
			switch (id) {
				case 'sandwich':
					fileName = "sandwichForm.html";
					$(".item-price").text('$10.00'); //instead of hardcoding price, assign id to each price-item above and use here
					break;
				case 'salad':
					fileName = "saladForm.html";
					$(".item-price").text('$7.00');
					break;
				default:
					fileName = "menu.css";
			}
	    
	    	$.get(fileName, function (data) {
	        	$(".modal-body").html(data);

	    	});
	    	 // $("#myModal").modal();
	        $('#myModal').modal('open');
		};
	</script>
</body>
</html>