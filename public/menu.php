<?php 

require "../application/cart.php";
require "../application/item.php";
session_start(); 
//session_unset();
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
 		$quantity = $_POST["quantity"];
 		//echo $price;
		foreach ($_POST as $key => $value) {
			$exp_key = explode('-', $key);
			if ($exp_key[0] == 't'){
				array_push($toppings, $value);
			}
		}
	

	//echo "---"; print_r($_SESSION['hubCart']); echo "--<br><br>";
	$_SESSION['hubCart']->orderAddToCart($item, $toppings, $price, $quantity); 
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
	<title>OrderHubLogin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/6aabf1bd39.js"></script>

	

<!-- 	Linking CSS files from shopping cart template (index.html) -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="shoppingCartTemplate/assets/css/custom.css"/>	


	<!-- Linking files for quantity button in modal -->
	<script src="quantityButton/quantityButton.js"></script>
	<link rel="stylesheet" type="text/css" href="quantityButton/quantityButton.css"/>

	
	<!-- <script src="https://www.w3schools.com/lib/w3data.js"></script> -->
	<!-- 
	<link rel="import" href="startbootstrap-modern-business-gh-pages/menu-startbootstrap-modern-business-gh.html"> -->
	
</head>


<body>
	
	<?php include 'startbootstrap-modern-business-gh-pages/iHubNav.html';?>


	<div class="d-flex">
		<h2>OrderHub</h2>
	</div>
	<div class = "flex-container">
		<div class="menu-body d-flex justify-content-start" id = "menuContainer"> 

		   <!-- |||||||Section starts: ENTREES ||||||||||||||||| -->
		    <div class="menu-section d-flex" id="includedContent">
		        <h2 class="menu-section-title">ENTREES</h2>

		        <?php include 'startbootstrap-modern-business-gh-pages/menu-startbootstrap-modern-business-gh.html';?>

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

				<div class="card menu-item" id="wrap" data-target="#myModal" data-toggle="modal" style="border-color: #333;">
					<div class="card-block">
					    <h3 class="card-title menu-item-name">Wrap</h3>
					    <div class="card-text menu-item-price" id="7">
					    	$7.00
					    </div>
					    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
				  	</div>
				</div>



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

			<div class="col-md-7 col-sm-12 text-left">
				
		  		<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
				<?php
				 //echo "<tr></tr>";
					
					$orderArray = $_SESSION['hubCart']->getOrder();
					$totalOrderPrice = 0;
					$counter = 0;
					while ($i = current($orderArray)) {

						echo "<li class=\"row\">";
						echo "<span class=\"quantity\">";
						echo $i->getItemQuantity();
						//echo $counter;
						echo "</span>";

						
						echo "<span class=\"itemName\">";
						echo ucfirst($i->getItemName()); 
						echo "<ul>";



						$toppings = $i->getToppings();
							foreach ($toppings as $key => $value) {
							 	echo "<li>"."-" .$value. " </li>";
						 	}
						echo "</ul>";


						echo "</span>";

						echo "<span class=\"popbtn\"><a class=\"arrow\"></a></span>";
						
						echo "<span class=\"price\">";
						echo "$".$i->getItemPrice().".00";
						echo "</span>";


						$currentItemPrice = (int)(ltrim( $i->getItemPrice(), "$"));
						
						

										 	
						next($orderArray);
						// echo "</tr>";
						$counter++;
						$totalOrderPrice += $currentItemPrice;

						



						echo "</li>";
					}
					echo "<li class=\"row totals\">";
							echo "<span class=\"itemName\">Total:";
							echo "</span>";
							echo "<span class=\"price\">". "$".$totalOrderPrice.".00";
							echo "</span>";
							echo "<span class=\"order\">";
							echo "<a href = \"checkout.php\"class = \"text-center\">ORDER</a>";
							echo "</span>";
				echo "</ul>";
					//echo "TOTAL PRICE = $".$totalOrderPrice.".00";
				?>   
					  			
			</div>
				<div id="popover" style="display: none">
					<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="#"><span class="glyphicon glyphicon-remove"></span></a>
				</div>	
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
				    
				    <input class = "modal-title" name="item" type = "hidden"><h1 class = "product_modal_name"></h1></input>
				    <!-- <input name="sandwich" type="hidden"><h1 name = "sandwich">Sandwich</h1></input> -->
				    
				    <input class="modal-title-price" name="price" type="hidden"><h3 class="item-price"></h3></input>

					<form id='myform' method='POST' action='#'>
					    <input type='button' value='-' class='qtyminus' field='quantity' />
					    <input type='text' name='quantity' value='0' class='qty' />
					    <input type='button' value='+' class='qtyplus' field='quantity' />
					</form>
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

			 //$(".modal-title").html(id);
			 //$(".product_modal_name").text("ada");
			 $(".modal-title").val(id);
			 $(".modal-title-price").val(price);

			var idText = id.substr(0,1).toUpperCase()+id.substr(1);
					$(".product_modal_name").text(idText);
			
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

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="shoppingCartTemplate/assets/js/bootstrap.min.js"></script>
		<script src="shoppingCartTemplate/assets/js/customjs.js"></script>
	

</body>
</html>