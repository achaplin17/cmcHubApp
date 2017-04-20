<?php


/* INSERT INTO CUSTOMER */
$query = "INSERT INTO Customer (name, streetAddress, city,state, zipcode ) VALUES (?, ?, ?, ?, ?)";
$cInsert = $conn->prepare($query);
$cInsert->bind_param("ssssi", $name, $street, $city, $state, $zipcode);

/* FIND CUSTOMER */
$query = "SELECT id from Customer where name=?";
$cSelect = $conn->prepare($query);
$cSelect->bind_param("s", $name);

/* INSERT INTO GirlScout */
$query = "INSERT INTO GirlScout (name) VALUES (?)";
$gsInsert = $conn->prepare($query);
$gsInsert->bind_param("s", $gsname);

/* FIND GirlScout */
$query = "SELECT id from GirlScout where name=?";
$gsSelect = $conn->prepare($query);
$gsSelect->bind_param("s", $gsname);

/* Add new Purchase Order */
$query = "INSERT INTO PurchaseOrder (gs_id, customer_id) VALUES (?, ?)";
$orderInsert = $conn->prepare($query);
$orderInsert->bind_param("ii", $gs_id, $customer_id);

/* Add new Cookie Item related to a PurchaseOrder */
$query = "INSERT INTO CookieOrder (quantity, order_id, variety, price ) VALUES (?, ?, ?, ?)";
$cookieOrderInsert = $conn->prepare($query);
$cookieOrderInsert->bind_param("iisi", $quantity, $order_id, $variety, $price);

?>