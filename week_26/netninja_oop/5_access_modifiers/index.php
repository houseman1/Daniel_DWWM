<?php
//ACCESS MODIFIERS

//Class names are capitalised and singular.
class User
{
    //Define the properties.
    //The values will be assigned by the constructor.
    //They will depend on the parameters entered when an instance is created.
    //'public' means the property can be accessed from inside and outside the class.
    //'private' means the property can only be accessed within the class.
    //Make a property private to restrict access to a property so that it can't be changed
    //or when you want more control over how it can be changed.
    public $username;
    private $email;

    //Constructors are created inside the class
    //Constructors are fired when an instance is created
    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function add_friend()
    {
        //$this = this instance of the class
        return "$this->username added a new friend";
    }

}
//Instantiate the class.
//Create a new object 'User' and store inside the variable '$user_one'.
$user_one = new User('mario', 'mario@email.com');
$user_two = new User('luigi', 'luigi@email.com');

//This code now throws an error because we cannot access the property from outside the class.
//echo $user_one->email . '<br>';
//echo $user_two->email . '<br>';

//This code works because it calls a function inside the class.
//The '$username' property can be used by the function because it is inside the class.
echo $user_one->add_friend();

?>

<html lang="en">
<head>
    <title>PHP OOP Tutorial</title>
</head>
<body>

</body>
</html>




