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

        //The purpose of the method 'get_name()' is to get the name of the property '$name'
        function get_name()
        {
            return $this->name;
        }

        //The purpose of the method 'get_color()' is to get the color of the property '$color'
        function get_color()
        {
            return $this->color;
        }
    }

    $strawberry = new cla_Fruit("Strawberry", "Red");
    echo $strawberry->get_name();
    echo "<br>";
    echo $strawberry->get_color();

?>

</body>

</html>


