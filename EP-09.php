<?php
//============================= faced Pattern =======================
class SpaceShuttle{
    function powerOn(){
        echo "Power On\n";
    }
    function CheckTemperature(){
        echo "Checking 50 Celsius\n";
    }
    function checkFuel(){
        echo "Is Available Octen\n";
    }
    function startEngine(){
        echo "Engine Starting\n";
    }
    function startThrusters(){
        echo "Start Thrusting\n";
    }
}

class SpaceShuttleFaced{
     protected $spaceshuttle;
    function __construct(SpaceShuttle $st){
       $this->spaceshuttle = $st;
    }
    
    function takeOff(){
       $this->spaceshuttle->powerOn();
       $this->spaceshuttle->CheckTemperature();
       $this->spaceshuttle->checkFuel();
       $this->spaceshuttle->startEngine();
       $this->spaceshuttle->startThrusters();
    }
}



//----------------- default patter to show -------------------
$st = new SpaceShuttle ();
// $st->powerOn();
// $st->CheckTemperature();
// $st->checkFuel();
// $st->startEngine();
// $st->startThrusters();

//-------------------- faced Pattern -----------------
$ssf =  new  SpaceShuttleFaced($st);
$ssf->takeOff();