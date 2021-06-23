<html>

<body>

<?php

class cla_Fruit
{
    //The class 'fruit' contains two properties called '$name' and '$color'
    public $name;
    public  $color;

    //The two properties '$name' and '$color' are assigned as attributes of the constructor
    //The constructor serves as a set_name function at the moment an object is created
    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    //The destructor serves as a get_name function at the moment an object is created
    function  __destruct()
    {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

$obj_strawberry = new cla_Fruit("Strawberry", "red");


?>

</body>

</html>
