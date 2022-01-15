<?php
//-------------------------------------- singleton Pattern ----------------------------------

class Someclass{
    static $instance =  [];
    private $name;
    function __construct($name){
        $this->name = $name;
    }
    
   static function getInstance($name=null){
       if(!isset(self::$instance[$name])){
            self::$instance[$name] = new Someclass($name);
           echo "New Instance Created\n";
       }
       return self::$instance[$name];
   }

   function SayName(){
       echo $this->name;
   }
}

$s1 = Someclass::getInstance("Rayhan\n");
$s2 = Someclass::getInstance("Rahman");
$s3 = Someclass::getInstance();

$s1->SayName();
$s2->SayName();
$s3->SayName();

