<?php

// Represents the shopping cart for a single session.

class Cart {
	


    
    // The array that contains the order
    private $order; 
	
    // Initially, the cart is empty
    public function __construct() {
        $this->order = Array();
    }
	
    // Adds an order to the shopping cart.  
    public function orderAddToCart($name, $toppings, $price) {

        // creating new item instance 
        $newItem = new Item($name, $toppings, $price);
        // add item to order array
       
        array_push($this->order, $newItem);
    }
	

    // Display the order for debugging purposes.
    public function display() {
        print_r($this->order);
    }

    public function getOrder() {
        return $this->order;
    }

     

     // Girlscout Cookies methods
    //enables user to delete an item from shopping cart

    //  public function delete($variety) {
    //   $this->order[$variety] = 0;
    //   unset($this->order[$variety]);
    // }
    

    //enables user to add a quantity of an item in shopping cart
    // public function add($variety) {
    //   $currentQuantity = $this->order[$variety];
    //   $this->order[$variety] = $currentQuantity + 1;
    // }
    


    //enables user to subtract quantity of an item in shopping cart
    // public function subtract($variety) {
    //   $currentQuantity = $this->order[$variety];
    //   $this->order[$variety] = $currentQuantity - 1;
    // }



}

?>
