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
//  //print_r(" ". $key);
//  foreach ($_POST as $toppingsAdded) {
//      if ($toppingsAdded = $key) {
//          //print_r($key);
//      }
//  }

// }


// foreach (cart::$toppingsArr as $key) {
//  print_r(" ". $key);
//  if (in_array($key, $_POST)) {
//      //print_r($key);
//  }

// }

// foreach ($_POST as $key) {
//  $key = explode('t-'.$key);

// }
// $search = "t-";
// $search_length = strlen($search);
// foreach ($_POST as $key => $value) {
//  if (substr($key, 0, $search_length) == $search) {
//      print_r($value);
//  }
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
//      if ($item && is_numeric($quantity) && $quantity > 0) {
//          $_SESSION['hubCart']->order($item, $quantity); //DON'T FORGET TO ADD MESSAGE IN MODAL IF QUANTITY IS NOT NUMBER OR LESS THAN 0!!!!
        
            //unset($_POST["item"]);
            //echo("added ". $quantity);

            //echo("added ". $item);
        
//      }
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
 


   





    

    <!-- ***************** Sample Shopping Cart ******************* -->


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
    <input type="submit" value="Resume Shopping" />
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
          <input type="checkbox" name="t-turkey" id="Meat-0" value="turkey">
          Flex
        </label>
      </div>
      <div class="checkbox">
        <label for="Meat-1">
          <input type="checkbox" name="t-ham" id="Meat-1" value="ham">
        Claremont Cash
        </label>
      </div>
      <div class="checkbox">
        <label for="Meat-2">
          <input type="checkbox" name="t-steak" id="Meat-2" value="steak">
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

</fieldset>
</form>


<form>
    <input type="submit" value="Submit" onclick = "myFunction()"/>
</form>
<script>

function myFunction() {
    alert("Thanks for shopping, your order will be ready for pickup soon.")
}
</script>



<!-- Script for making menu-item div clickable and for linking to modal -->


    
</body>
</html>