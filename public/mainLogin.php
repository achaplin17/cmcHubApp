<?php 
// Include the ShoppingCart class.  Since the session contains a
// ShoppingCard object, this must be done before session_start().
 require "../application/cart.php";

 session_start(); 

$conn = @mysqli_connect( "localhost", "root", "root", "iHub" ) or die( "Connect failed: ". mysqli_connect_error() );
include ('queries.php');
//include ('OrderHub_Home_Page/index.html');

//print_r($_SESSION);
// echo "<br>after starting a session in index4. . .";
?>

<!DOCTYPE html>

<?php
   // if ($_POST['submit']) {

// If this session is just beginning, store an empty ShoppingCart in it.
if (!isset($_SESSION['hubCart'])) {
    $_SESSION['hubCart'] = new Cart();

}

 if ($_POST['submit']) {
 	$id = $_POST['cmc_id'];
 	$phoneNumber = '650-787-2116';
 	mysqli_stmt_execute($cInsert);
 	echo '<script>window.location="menuReplacement1.php"</script>';
 	

 }

?>

<html lang="en">

<head>
 <!-- ******************* TEMPLATE LINKS ******************* -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOME</title>

    <!-- Bootstrap Core CSS -->
    <link href="OrderHub_Home_Page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="OrderHub_Home_Page/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="OrderHub_Home_Page/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="OrderHub_Home_Page/css/creative.min1.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- ******************* END TEMPLATE LINKS ******************* -->

<script language="javascript">

// Display the image corresponding to the cookie that is selected.


function validatePhone (control, errormessage) {
        var error="";
        var phoneNumber = /^[0-9]{8}$/;
        document.getElementById(control.id).nextSibling.innerHTML="";
        //if (control.value.length < length) {
        if (control.value.match(phoneNumber)) {
           document.getElementById("loginbutton").disabled=false;
           return error; 
        }
            else {
                document.getElementById("loginbutton").disabled=true;
                error = errormessage;
                document.getElementById(control.id).nextSibling.innerHTML=errormessage;
                document.getElementById(control.id).focus();
        }
    }


// Determine which selection should appear in the menu and which variety should
// be displayed.

</script>
</head>


<!-- Every time this page loads, set the initial state of the form and
     update the image to match. -->
<body>
<!-- ******************* HOME PAGE TEMPLATE CODE ******************* -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
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
                        <a class="page-scroll" href="#about">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">How it Works</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a href="hubEmployeeView.php">EMPLOYEES</a>
                    </li>

                    <!-- <a href="mainLogin.php">HOME PAGE</a> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner" style="background: rgba(34, 34, 34, 0.5);">
                <h1 id="homeHeading">OrderHub</h1>
                <hr>
                <p>Order anything you want from the Hub, anytime. No more waiting in lines.</p>
                <form method="post">

                    <input type="txt" name="cmc_id"  id="cmc_id" style="color:black" placeholder="Please enter CMC ID" onBlur="validatePhone(this, '  Please enter a valid CMC id!')"><span class="message"></span>
                    </br>
                    </br>
                    <input type="submit" class="btn btn-primary btn-xl page-scroll" id = "loginbutton" name="submit" value="Submit">
                    </input>
                </form>
            </div>
        </div>
    </header>


    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">How It Works</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Enter your CMC ID to login above</h3>
                        <p class="text-muted">No password, no email - all you need is your CMC ID to login and make a payment.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Select your order from the menu</h3>
                        <p class="text-muted">Look at our fresh menu options, updated daily, including the Special of the Day</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Choose your payment option</h3>
                        <p class="text-muted">Pay in many ways - Claremont Cash, Flex, or Venmo.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Check your phone to see when your order is ready </h3>
                        <p class="text-muted">We'll text you as soon as your order is ready, so you can pick it up hot and ready.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Come enjoy a bite at the Hub!</h2>
               
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Hub Hours</h2>
                    <hr class="primary">
                    <p>Monday - Friday: 1pm - 7pm</p>
                    <p>Saturday: 12pm - 7pm</p>
                    <p>Sunday: 1pm - 7pm</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>909-607-2883</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@orderhub.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="OrderHub_Home_Page/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="OrderHub_Home_Page/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="OrderHub_Home_Page/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="OrderHub_Home_Page/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="OrderHub_Home_Page/js/creative.min.js"></script>
<!-- ******************* END OF HOME PAGE TEMPLATE CODE ******************* -->

</body>
</html>