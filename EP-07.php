<?php
//========================== Abstract Factory Pattern =========================
class Carr{
   function getName(){
       echo "car\n";
   }
}
class Truck{
    function getName(){
        echo "truck\n";
    }
}
abstract class Factory{
    abstract function create();
}

class CarrFactory extends Factory{
    function create(){
        return new Carr();
    }
}
class TruckFactory extends Factory{
    function create(){
        return new Truck();
    }
}
class VehicleFactory{
    function createVehicle( $pram){
        if('car' == $pram){
            return new CarrFactory();
        }
        elseif('truck' == $pram){
            return new TruckFactory();
        }
    }
}

$cf = new Carr();
$cff = $cf->getName();
$vf = new VehicleFactory();
$vff = $vf->createVehicle($cff);
echo $vff;

$tr = new Truck();
$trr = $tr->getName();
$vff = $vf->createVehicle($trr);
echo $vff;
