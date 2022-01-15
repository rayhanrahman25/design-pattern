<?php

class Collectingfruit{
       static $Basket = [];
       protected $fruit;
       function __construct($fruit){
         $this->fruit = $fruit;  
       }
   static function getBasket($fruit){
    if(!isset(self::$Basket[$fruit])){
        self::$Basket[$fruit] = new Collectingfruit($fruit);
    }
    return self::$Basket[$fruit];
   }

   function FruitName(){
     echo  $this->fruit."\n";
   }
}

$f1 = Collectingfruit::getBasket("Apple");
$f2 = Collectingfruit::getBasket("Cherry");
$f3 = Collectingfruit::getBasket("Orange");


$f1->FruitName();
$f2->FruitName();
$f3->FruitName();