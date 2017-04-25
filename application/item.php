<?php

// Represents the item object

 class Item {
	
    public $itemName;
   
    // The array that contains the toppings
    public $toppingsArr;

    public $itemPrice; 
	
    // Initially, the cart is empty
    public function __construct($name, $toppings, $price) {
        
        $this->itemName = $name;
        $this->toppingsArr = $toppings;
        $this->itemPrice = $price;
    }

	
    // Display the toppings for debugging purposes.
    // public function display() {
    //     print_r($this->toppings);
    // }

    public function getToppings() {

        return $this->toppingsArr;
    }

    public function getItemName() {
        return $this->itemName;
    }

     public function getItemPrice() {
        return $this->itemPrice;
    }
    

    //enables user to add a topping in to the toppings array of an item
    public function addTopping($individualTopping) {
      array_push($this->array[$this->toppingsArr], $individualTopping);
    }
}

?>
