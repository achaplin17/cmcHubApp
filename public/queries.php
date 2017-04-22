<?php


/* INSERT INTO CUSTOMER */
$query = "INSERT INTO Customer (id, phoneNumber) VALUES (?, ?)";
$cInsert = $conn->prepare($query);
$cInsert->bind_param("ss", $id, $phoneNumber);

// /* FIND CUSTOMER */
// $query = "SELECT id from Customer where name=?";
// $cSelect = $conn->prepare($query);
// $cSelect->bind_param("s", $name);

// /* INSERT INTO Orders */
$query = "INSERT INTO Orders (cmc_id, payment_type, order_date, number_of_items, total_order_price) VALUES (?, ?, ?, ?, ?)";
$orderInsert = $conn->prepare($query);
$orderInsert->bind_param("ssiii", $cmc_id, $payment_type, $order_date, $number_of_items, $total_order_price);

/* INSERT INTO Item */
$query = "INSERT INTO Item (type, name, quantity, order_id, price, instructions) VALUES (?, ?, ?, ?, ?, ?)";
$itemInsert = $conn->prepare($query);
$itemInsert->bind_param("ssiiis", $type, $name, $quantity, $order_id, $price, $instructions);

/* INSERT INTO Toppings */
// $query = "INSERT INTO Toppings (toppings_name, item_id) VALUES (?, ?)";
// $toppingsInsert = $conn->prepare($query);
// $toppingsInsert->bind_param("si", $toppings_name, $item_id);
?>
<!-- 

// /* FIND GirlScout */
// $query = "SELECT id from GirlScout where name=?";
// $gsSelect = $conn->prepare($query);
// $gsSelect->bind_param("s", $gsname);

//  Add new Purchase Order 
// $query = "INSERT INTO PurchaseOrder (gs_id, customer_id) VALUES (?, ?)";
// $orderInsert = $conn->prepare($query);
// $orderInsert->bind_param("ii", $gs_id, $customer_id);

// /* Add new Cookie Item related to a PurchaseOrder */
// $query = "INSERT INTO CookieOrder (quantity, order_id, variety, price ) VALUES (?, ?, ?, ?)";
// $cookieOrderInsert = $conn->prepare($query);
// $cookieOrderInsert->bind_param("iisi", $quantity, $order_id, $variety, $price);

?> -->