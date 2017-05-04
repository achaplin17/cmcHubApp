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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li class="active">
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blog Post
                    <small>by <a href="#">Start Bootstrap</a>
                    </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Blog Post</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

               

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                

                

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Well -->
                <div class="well">
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
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
