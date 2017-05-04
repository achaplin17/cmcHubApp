<?php

// Represents the item object

 class Item {
	
    public $itemName;
   
   // public $itemID;
    // The array that contains the toppings
    public $toppingsArr;

    public $itemPrice; 

    public $quantity;
	
    // Initially, the cart is empty
    public function __construct($name, $toppings, $price, $quantity) {
        
        $this->itemName = $name;
        $this->toppingsArr = $toppings;
        $this->itemPrice = $price;
        $this->quantity = $quantity;
        // $this->itemID = $itemID;

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

    public function getItemQuantity() {
        return $this->quantity;
    }

    public function getItemID() {
        return $this->itemID;
    }
    
    // public function setItemID($idToSet) {
    //     $this->itemID = $idToSet;
    // }

    //enables user to add a topping in to the toppings array of an item
    public function addTopping($individualTopping) {
      array_push($this->array[$this->toppingsArr], $individualTopping);
    }
}

?>
