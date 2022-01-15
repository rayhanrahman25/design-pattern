<?php
//============================== Factiory Pattern ==================================
$cars = [
    "nissan" => [
        "sunny" => [
            'make' => 2004,
            'model' => 'Nissan Sunny B14',
            'displacement' => '1503cc',
            'feature'=>'Some Special Features For Filder 2004'
        ],
        "sunny-ex" => [
            'make' => 2005,
            'model' => 'Nissan Sunny Ex Saloon',
            'displacement' => '1300cc',
            'feature'=>'Some Special Features For Filder 2004'
        ],
    ],
    "toyota" => [
        "axio" => [
            'make' => 2004,
            'model' => 'Toyota Corolla Axio',
            'displacement' => '1500cc',
            'feature'=>'Some Special Features For Axio 2004'
        ],
        "filder" => [
            'make' => 2005,
            'model' => 'Toyota Corolla Fielder',
            'displacement' => '1500cc',
            'feature'=>'Some Special Features For Filder 2004'
        ],
    ],
];

class Car{
    protected $make, $model, $displacement, $feature;
    function __construct($data){
        $this->make = $data['make'];
        $this->model = $data['model'];
        $this->displacement = $data['displacement'];
        $this->feature = $data['feature'];
    }

    function __call($method, $arg=null){
        $parameter = str_replace("get",'', strtolower($method));
     if(isset($this->{$parameter})){
         return $this->{$parameter}."\n";
     }
     return '';
    }
}
class Carfactory{
       protected $car ;
    function __construct($car){
        $this->car = $car;
    }

    function getNissanSunny(){
        $car = $this->car['nissan']['sunny'];
       return new Car($car);
    }
}

$carFactory = new Carfactory($cars);
echo $carFactory->getNissanSunny()->getModel();