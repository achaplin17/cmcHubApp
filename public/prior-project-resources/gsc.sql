-- DROP DATABASE IF EXISTS GSC;

CREATE DATABASE GSC;

USE GSC;



#1)Customer

CREATE TABLE Customer (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, #LIKELY need to auto_increment all Ids (check with salloum)
	first_name VARCHAR(256) NOT NULL,
	last_name VARCHAR(256) NOT NULL,
	streetAddress VARCHAR(256) NOT NULL,
	city VARCHAR(256) NOT NULL,
	state VARCHAR(256) NOT NULL,
	zipcode INT UNSIGNED NOT NULL

);

#2)GirlScout 

CREATE TABLE GirlScout (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT  PRIMARY KEY, 
	name VARCHAR(256) NOT NULL,
	troop VARCHAR(256) NOT NULL
);

  
#3)PurchaseOrder
CREATE TABLE PurchaseOrder (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT  PRIMARY KEY, 
	gs_id INT UNSIGNED NOT NULL, #girl scout id
	customer_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (customer_id) REFERENCES Customer(id),
	FOREIGN KEY (gs_id) REFERENCES GirlScout(id) #thus include "id" field in GirlScout Table

);


#4)CookieOrder

CREATE TABLE CookieOrder (
	variety VARCHAR(256), #cookie type
	quantity INT SIGNED NOT NULL,
	order_id INT UNSIGNED NOT NULL,
	FOREIGN KEY (order_id) REFERENCES PurchaseOrder(id)
);


#PS3 #4 - Replacement for "reports.php"
##############################################################################

#1: List the name of the girl scout that has referred the most customers

SELECT po.gs_id, g.name, COUNT(*) as numReferrals
FROM PurchaseOrder po, GirlScout g
WHERE po.gs_id = g.id 
GROUP BY po.gs_id
ORDER BY numReferrals DESC LIMIT 1;


#2: List the last name of customer that has made the most orders

SELECT po.customer_id, c.last_name, COUNT(*) as numOrders
FROM PurchaseOrder po, Customer c
WHERE po.customer_id = c.id 
GROUP BY po.customer_id
ORDER BY numOrders DESC LIMIT 1;


#3: List name of customer that has ordered the most cookies


#a. how many total cookies per order:

CREATE VIEW totalOrder as
SELECT order_id, SUM(quantity) as numCookiePerOrder
FROM CookieOrder co
GROUP BY co.order_id;


#b. total cookies per customer (based on all orders)


SELECT po.customer_id, c.last_name, SUM(numCookiePerOrder)
FROM   PurchaseOrder po, Customer c, totalOrder
WHERE  po.id = totalOrder.order_id AND po.customer_id = c.id
GROUP BY po.customer_id 
ORDER BY SUM(numCookiePerOrder) DESC LIMIT 1;



#4 List most popular cookie type

#a. For each order, show the number of each type of cookie ordered
CREATE VIEW totalQuantities as
SELECT co.order_id, co.variety, co.quantity
FROM CookieOrder co;

#b. For each cookie in all the orders, sum the quantity per cookie, and select cookie with highest quantity (aka most popular cookie type)

SELECT variety, sum(quantity)
FROM totalQuantities
GROUP BY variety
ORDER BY sum(quantity) DESC LIMIT 1;

 






