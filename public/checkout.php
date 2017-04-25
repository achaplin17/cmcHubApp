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
 	$total_order_price = "69";


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
    <script src="https://use.fontawesome.com/6aabf1bd39.js"></script>
</head>


<body>



    <div class="d-flex">
        <h2>OrderHub</h2>
    </div>
 


   





    

    <!-- ***************** Shopping Cart ******************* -->


    <h3>Order Summary</h3>

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


<form action='menu.php'>
    <input type="submit" value="Resume Shopping" name = "resumeShopping" />
</form>

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