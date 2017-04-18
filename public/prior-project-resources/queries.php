<?php



/* Insert into Customer table */
$query = "INSERT INTO Customer (first_name, last_name, streetAddress, city, state, zipcode) VALUES
(?,?,?,?,?,?)";
$customerInsert = $conn->prepare($query); //$conn created in checkout.php and assigned to the variable $dbc in dbconn.php indicating whether database is connected or not
$customerInsert->bind_param("sssssi", $first_name, $last_name, $street, $city, $state, $zipcode); //I believe in first parameter "ssssi", s = string and i = integer


// /* Insert into GirlScout table */
$query = "INSERT INTO GirlScout (name, troop) VALUES (?,?)";
$girlScoutInsert = $conn->prepare($query);
$girlScoutInsert->bind_param("ss", $name, $troop);


/* Insert into PurchaseOrder Table */
$query = "INSERT INTO PurchaseOrder (gs_id, customer_id) VALUES (?,?)";
$orderInsert = $conn->prepare($query);
$orderInsert->bind_param("ii", $gs_id, $customer_id);

/* Insert into CookieOrder Table */
$query = "INSERT INTO CookieOrder (quantity, variety, order_id) VALUES (?,?,?)";
$cookieInsert = $conn->prepare($query);
$cookieInsert -> bind_param("isi", $quantity, $variety, $order_id);


// // //SELECT Customer id based on name   
// $query = "SELECT id from Customer where name=?";
// $customerSelect = $conn->prepare($query);
// $customerSelect->bind_param("s", $name);


?>