<?php

class Car
{
    public $color = 'red';
    private $weight = 2000;

    //Declaring class properties or methods as static makes them accessible without needing an instantiation of the class.
    //These can also be accessed statically within an instantiated class object.
    //Static properties are accessed using the Scope Resolution Operator (::) and cannot be accessed through the object operator (->).
    static $counter = 0;
    public $my_counter = 0;

    //self relates to the class, not an instance of the class
    public function __construct()
    {
        self::$counter++;
        $this->my_counter++;
    }
}

//The following displays: "1 1 2 1"
//The static counter increases each time an instance is created
//The instance counter will always be one because each time an instance is created $my_counter = $my_counter + 1 (0+1)
$my_car = new Car();
echo Car::$counter.' '.$my_car->my_counter.PHP_EOL;
$my_car2 = new Car();
echo Car::$counter.' '.$my_car2->my_counter.PHP_EOL;
