<?php 

require "../application/cart.php";
require "../application/item.php";
session_start(); 
// session_unset();
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
    
    $_SESSION['hubCart']->orderAddToCart($item, $toppings, $price, $quantity); 
    
 }
?>



<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    
    <!-- Navigation -->
 

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

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Menu
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-responsive" src="imageAssets/hubHighRes.jpg" alt="">

                <hr>
                
                
        <!-- Service List -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="menu-section row">
            <div class="col-lg-12">
                <h2 class="page-header">Hot/Cold Sandwiches</h2>
            </div>

            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="sandwich" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Turkey Sub</h4>
                        <div class="menu-item-price" id="5">
                            $5.00
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="sandwich" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Ham Sub</h4>
                        <div class="menu-item-price" id="5">
                            $5.00
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="sandwich" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Italian Sub</h4>
                        <div class="menu-item-price" id="5">
                            $5.00
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="menu-section row">
            <div class="col-lg-12">
                <h2 class="page-header">Salads</h2>
            </div>

             <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="salad" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Caesar</h4>
                        <div class="menu-item-price" id="5">
                            $5.00
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="salad" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Garden</h4>
                        <div class="menu-item-price" id="6">
                            $6.00
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="salad" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Chicken Caesar</h4>
                        <div class="menu-item-price" id="6">
                            $6.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-section row">
            <div class="col-lg-12">
                <h2 class="page-header">From The Grill</h2>
            </div>

            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="burger" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Burger</h4>
                        <div class="menu-item-price" id="5">
                            $5.00
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="Quesadilla" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Quesadilla</h4>
                        <div class="menu-item-price" id="6">
                            $6.00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body menu-item" id="Chicken Tenders" data-target="#myModal" data-toggle="modal">
                        <h4 class="media-heading menu-item-name">Chicken Tenders</h4>
                        <div class="menu-item-price" id="6">
                            $6.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- END OF CONTAINER -->
            </div> 

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
                                        
                    </div>
                    <div id="popover" style="display: none">
                        <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>  
                </div>
            </div>
        </div>
        <!-- /.row -->

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


    </div>
    <!-- /.container -->


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
