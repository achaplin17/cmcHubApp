<?php 

require "../application/cart.php";
require "../application/item.php";
session_start(); 
session_unset();
?>

<!DOCTYPE html>

<?php

//print_r($_SESSION['hubCart']);


if (!isset($_SESSION['hubCart'])) {
    $_SESSION['hubCart'] = new Cart();


}

 if ($_POST["item"]) {
 	    $toppings = array();
 		$item = $_POST["item"];
 		$price = $_POST["price"];
 		echo $price;
		foreach ($_POST as $key => $value) {
			$exp_key = explode('-', $key);
			if ($exp_key[0] == 't'){
				array_push($toppings, $value);
			}
		}
	

	//echo "---"; print_r($_SESSION['hubCart']); echo "--<br><br>";
	$_SESSION['hubCart']->orderAddToCart($item, $toppings, $price); 
	//echo "---"; print_r($_SESSION['hubCart']); echo "--";
 	

 }


// if ($_POST["foo"]) {
// 		if ($item && is_numeric($quantity) && $quantity > 0) {
// 			$_SESSION['hubCart']->order($item, $quantity); //DON'T FORGET TO ADD MESSAGE IN MODAL IF QUANTITY IS NOT NUMBER OR LESS THAN 0!!!!
		
			//unset($_POST["item"]);
			//echo("added ". $quantity);

			//echo("added ". $item);
		
// 		}
// }


?>



<html lang="en">

<head>
	<link rel = "stylesheet" href="finalmenu.css">
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
		         	<div class="menu-item-price" id="5">
		            	$5.00
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
		         	<div class="menu-item-price" id="6">
		            	$6.00
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

			<!-- *****************Shopping Cart ******************* -->

			<table class="table table-bordered">
			<thead>
		  		<tr>
		  			<th>#</th>
		  			<th>Price</th>
		  			<th>Item</th>
		  			<th>Toppings</th>
		  		</tr>
		  	</thead>
		  	<tbody>
				<?php
				 //echo "<tr></tr>";
					
					$orderArray = $_SESSION['hubCart']->getOrder();
					$totalOrderPrice = 0;
					$counter = 0;
					while ($i = current($orderArray)) {

						echo "<tr>";
						echo "<td>";

						echo $counter;

					
						echo "</td>";
						echo "<td>";
						echo "$".$i->getItemPrice().".00";

						$currentItemPrice = (int)(ltrim( $i->getItemPrice(), "$"));
						
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
						$totalOrderPrice += $currentItemPrice;

					}
					echo "TOTAL PRICE = $".$totalOrderPrice.".00";
				?>   
		     </tbody>	
			</table>
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
				    
				    
				    <input class="modal-title-price" name="price" type="hidden"><h3 class="item-price"></h3></input>
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
	      			var price = $(this).find(".menu-item-price").attr("id");
	      			showModal(id, price);
	   			});
	  		});
		});

		// receive the id passed in from the above script. simple switch case to test the string value of the id, then assign a variable with the correct file name to finally be used for retrieving proper data to show in the modal. 
		
	function showModal(id, price) {

			 // $(".modal-title").html(id);
			 $(".modal-title").val(id);
			 $(".modal-title-price").val(price);


			
			var fileName;
			switch (id) {
				case 'sandwich':
					fileName = "sandwichForm.html";
					$(".item-price").text("$" + price + ".00"); //instead of hardcoding price, assign id to each price-item above and use here
					break;
				case 'salad':
					fileName = "saladForm.html";
					$(".item-price").text("$" + price + ".00");
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