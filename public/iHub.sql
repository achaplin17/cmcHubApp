e
DROP DATABASE IF EXISTS iHub;


CREATE DATABASE iHub;

USE iHub;

CREATE TABLE Customer (
    id INT UNSIGNED NOT NULL PRIMARY KEY, 
    -- IS IT BAD PRACTICE TO HAVE TWO OF THE SAME NAME VARIABLES IN DIFFERENT TABLES
    phoneNumber INT UNSIGNED 

);


CREATE TABLE Orders (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  cmc_id INT UNSIGNED NOT NULL,
  FOREIGN KEY (cmc_id) REFERENCES Customer(id),
  payment_type VARCHAR(256) NOT NULL,
  order_date INT UNSIGNED NOT NULL, 
  number_of_items INT NOT NULL,
  total_order_price INT UNSIGNED NOT NULL

);


CREATE TABLE Item (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  type VARCHAR(8),
  name VARCHAR(20),
  quantity INT UNSIGNED NOT NULL,

  order_id INT UNSIGNED NOT NULL,
  FOREIGN KEY (order_id) REFERENCES Orders(id),
  price INT UNSIGNED NOT NULL,
  instructions VARCHAR(256)
);

CREATE TABLE Toppings (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  toppings_name VARCHAR(256), 
  item_id INT UNSIGNED NOT NULL,
  FOREIGN KEY (item_id) REFERENCES Item(id)
);



-- INSERT INTO Item (type, name, quantity, order_id, price, instructions) VALUES ("entree", "sandwich", 1, 1, 2, "cook it well done my brotha");
-- INSERT INTO Customer (phoneNumber) VALUES (91712);


-- INSERT INTO Customer (name, streetAddress, city, state, zipcode) VALUES ("daniel", "789 claremont", "claremont", "ca", 91711);

-- INSERT INTO GirlScout (name) VALUES ("jane");

-- INSERT INTO PurchaseOrder (gs_id, customer_id) VALUES (1, 1);
-- INSERT INTO CookieOrder ( variety, quantity, order_id, price) VALUES ("thinmints", 2, 1, 4);
-- INSERT INTO CookieOrder ( variety, quantity, order_id, price) VALUES ("caramel", 5, 1, 4);





