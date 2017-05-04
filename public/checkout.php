<?php 

require "../application/cart.php";
require "../application/item.php";
session_start();
$conn = @mysqli_connect( "localhost", "root", "root", "iHub" ) or die( "Connect failed: ". mysqli_connect_error() );
include ('queries.php'); 
?>

<!DOCTYPE html>

<?php

//print_r($_SESSION['hubCart']);


if (!isset($_SESSION['hubCart'])) {
    $_SESSION['hubCart'] = new Cart();


}


 if ($_POST['submit']) {
 	//echo "asd";

 	// ****************** ORDERS ****************** 

 	$cmc_id = "sad";
 	$checked = isset($_POST['check_list']) ? $_POST['check_list'] : array();
 	$checked_value = $_POST['check_list'][0];
 	$payment_type = $checked_value;
 	//echo $payment_type;
 	$order_date = "4/20/17";
 	$number_of_items = count($_SESSION['hubCart']->getOrder());
 	$total_order_price = "$5.00";


 	mysqli_stmt_execute($orderInsert);
    $order_id =  mysqli_stmt_insert_id($orderInsert);
    
 
    mysqli_stmt_close($orderInsert);
 
 	

    // ****************** ITEM ****************** 



    $item_sql_array = $_SESSION['hubCart']->getOrder();
   	while ($j = current($item_sql_array)) {

   		$type = "sad";
   		$quantity = 1;
 		$price = 1;
 		$instructions = "I LOVE THE HARD CODE";
   		
   		$name = $j->getItemName();  
     	
     	mysqli_stmt_execute($itemInsert); 
     	$item_id =  mysqli_stmt_insert_id($itemInsert);
     	 mysqli_stmt_close($itemInsert);
     	
     	next($item_sql_array);  
 	}




    // ****************** TOPPINGS ****************** 


    $itemForToppings_sql_array = $_SESSION['hubCart']->getOrder();
  
   	while ($k = current($itemForToppings_sql_array )) {
   		
     	$toppings_Arr = $k->getToppings();
     
            foreach ($toppings_Arr as $key => $value) {
                $toppings_name = $value;
                mysqli_stmt_execute($toppingsInsert); 
            } 

      next($itemForToppings_sql_array);  
 	}



                        



 	session_unset();
     echo '<script>window.location="mainLogin.php"</script>';
 }




 if ($_POST["item"]) {
        $toppings = array();
        $item = $_POST["item"];
        foreach ($_POST as $key => $value) {
            $exp_key = explode('-', $key);
            if ($exp_key[0] == 't'){
                array_push($toppings, $value);
            }
        }

    $_SESSION['hubCart']->orderAddToCart($item, $toppings); 
    //echo "---"; print_r($_SESSION['hubCart']); echo "--";
 }

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


   





    

    
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Well -->
                <div class="well">
                    <h2 id="cartTitle">Cart</h2>
                                <!-- *****************Shopping Cart ******************* -->

                    <div>
                        
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
                            <form action='menuReplacement1.php'>
    <input type="submit" value="Resume Shopping" name = "resumeShopping" />
</form>             
                    </div>
                    <div id="popover" style="display: none">
                        <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>  
                </div>
            </div>

        </div>
        <!-- /.row -->




<form method ="post">
<fieldset>

  <!-- Multiple Checkboxes -->
  <div class="form-group">
  <input name="sandwich" type="hidden"><h1 name = "sandwich">Payment Option</h1></input>
    <label class="col-md-4 control-label" for="Meat">Select your preferred payment option</label>
    <div class="col-md-4">
      <div class="checkbox">
        <label for="Meat-0">
          <input type="checkbox" name="check_list[]" id="Meat-0" value="Flex">
          Flex
        </label>
      </div>
      <div class="checkbox">
        <label for="Meat-1">
          <input type="checkbox" name="check_list[]" id="Meat-1" value="Claremont Cash">
        Claremont Cash
        </label>
      </div>
      <div class="checkbox">
        <label for="Meat-2">
          <input type="checkbox" name="check_list[]" id="Meat-2" value="Venmo">
        Venmo
        </label>
      </div>
    </div>
  </div>

  <!-- Textarea -->
  <!-- <div class="form-group">
    <label class="col-md-4 control-label" for="instructions">Put in any special instructions!</label>
    <div class="col-md-4">                     
      <textarea class="form-control" id="instructions" name="instructions"></textarea>
    </div>
  </div> -->
<input type="submit" name = "submit" value="Submit" onclick = "myFunction()"/>
</fieldset>
</form>


<script>

function myFunction() {
    alert("Thanks for shopping, your order will be ready for pickup soon.")
}
</script>



<!-- Script for making menu-item div clickable and for linking to modal -->


    
</body>
</html>