<?php
class Car 
{
    public $brand;

    public function starEngine()
    {
        echo "Engine started!";
    }
}

$car1 = new Car();
$car1->brand = "Toyota";

$car2 = new Car();
$car2->brand = "Honda";

$car1->starEngine();
echo $car2->brand;
?>