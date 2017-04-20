
<?php
$dbc = @mysqli_connect( "localhost", "root", "root", “iHub” ) or die( "Connect failed: ". mysqli_connect_error() );
 
include ('queries.php');

?>