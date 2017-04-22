<?php 
// Include the ShoppingCart class.  Since the session contains a
// ShoppingCard object, this must be done before session_start().
 require "../application/cart.php";

 session_start(); 

$conn = @mysqli_connect( "localhost", "root", "root", "iHub" ) or die( "Connect failed: ". mysqli_connect_error() );
include ('queries.php');

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
 	echo '<script>window.location="menu.php"</script>';
 	

 }

?>

<html lang="en">

<head>
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


<title>OrderHubLogin4</title>





<!-- Every time this page loads, set the initial state of the form and
     update the image to match. -->
<body onload="setDefaultVarietyAndQuantity(); updateImage();">

<h2>OrderHub</h2>

<p>Please enter your CMC id</p> 

<form method="post">

 <input type="txt" name="cmc_id"  id="cmc_id"  onBlur="validatePhone(this, '  Please enter a valid CMC id!')"><span class="message"></span>
</br>
 <input type="submit" id = "loginbutton" name="submit" value="Submit"></input>
</form>

</body>
</html>