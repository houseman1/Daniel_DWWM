<?php

//Define a class
class User {
    //Properties
    public $name = "Dan";

    //Methods
    public function sayHello()
    {
        return $this->name . "says Hello";
    }

}

//Instantiate user object from "User Class"
$user = new User();
//echo $user->name;
echo "<br>";
echo $user->sayHello();