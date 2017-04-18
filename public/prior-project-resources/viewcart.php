<?php 
// Include the ShoppingCart class.  Since the session contains a
// ShoppingCard object, this must be done before session_start().
require "../application/cart.php";
session_start(); 
?>

<!DOCTYPE html>

<?php 

// If this session is just beginning, store an empty ShoppingCart in it.




if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = new ShoppingCart();
}


foreach (ShoppingCart::$cookieTypes as $key => $type) {
  if ($_POST['delete_'.$key]) {
    $_SESSION['cart']->delete($key);  
  }
  if ($_POST['add_'.$key]) {
    $_SESSION['cart']->add($key); 
  }
  if ($_POST['subtract_'.$key]) {
    $_SESSION['cart']->subtract($key); 
  }
}



?>

<html lang="en">

<head>
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {   
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}


</style>
<title>Girl Scout Cookie Shopping Cart</title>
</head>

<body>

<h2>Girl Scout Cookie Shopping Cart</h2>

<p><?php

$order = $_SESSION['cart']->getOrder(); //loop through this to dynamically create table getting cookie type and quantity


?></p>



<form method="post" action = "viewcart.php">
<table>
  <tr><th>Cookie Type</th><th>Quantity Ordered</th><th>Action</th><th>Action</th><th>Action</th><th>Price</th>

  <tr>
         
<?php 
           


		   $price = 1;
		   $sum = 0;
           foreach ($order as $type => $quantity) {
                //echo "<tr>", "<td>" .$type."</td>" , "<td>" .$quantity. "</td>", "<td> $".$price. "</td>", "<td>", "Remove Item(s)", "</td>", "</tr>" ; 
           		echo "<tr>", "<td>" .$type."</td>" , "<td>" .$quantity. 
               "</td>". "<td><input type='submit' value='Delete' name='delete_$type'></input></td>
                  <td><input type='submit' value='Add Quantity' name='add_$type'></input></td>
                  <td><input type='submit' value='Subtract Quantity' name='subtract_$type'></input></td><td> $".$price. "</td>", "</tr>" ; 
           		$sum = $quantity + $sum;
            }
 ?>   

     </tr>

     <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  


    <?php 
    echo "<td> Total: $".$sum."</td>";
    ?> 


    </td> 

<br />
         
  
</table>



</p>

</form>

<p><a href="menu.php">Resume shopping</a></p>

<p><a href="checkout.php">Check out</a></p>





</body>
</html>