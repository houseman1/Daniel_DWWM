//https://www.youtube.com/watch?v=JSX0HMYgtvc

<html>

<body>

<h1>The Fruit Program</h1>

<?php

    //Create a new class
    class cla_Fruit
    {
        //The class 'fruit' contains two properties called '$name' and '$color'
        public $name;
        public  $color;

        //The class 'fruit' contains two methods: 'set_name()' and 'get_name'
        //The purpose of the method 'set_name() is to set the name of the property '$name'
        function set_name($name)
        {
            $this->name = $name;
        }

        //The purpose of the method 'get_name() is to get the name of the property '$name'
        function get_name()
        {
            return $this->name;
        }
    }

    //Create two instances(objects) of the class 'cla_Fruit'
    //Each object created from a class has the same methods and properties defined in the class
    //Each object will have different property values
    //Objects of classes are created using the 'new' keyword
    $obj_apple = new cla_Fruit();
    $obj_banana = new cla_Fruit();
    $obj_apple->set_name('Apple');
    $obj_banana->set_name('Banana');

    echo $obj_apple->get_name();
    echo "<br>";
    echo $obj_banana->get_name();
?>

</body>

</html>