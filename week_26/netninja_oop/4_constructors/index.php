<?php
//CONSTRUCTORS

//Class names are capitalised and singular.
class User
{
    //Define the properties.
    //The values will be assigned by the constructor.
    //They will depend on the parameters entered when an instance is created.
    public $username;
    public $email;

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

echo $user_one->username . '<br>';
echo $user_one->email . '<br>';
echo $user_one->add_friend() . '<br>' . '<br>';

//To change object properties outside of the class
$user_two->username = 'yoshi';
$user_two->email = 'yoshi@email.com';

echo $user_two->username . '<br>';
echo $user_two->email . '<br>';
echo $user_two->add_friend() . '<br>' . '<br>';

//To find out which properties and methods are used by the class
print_r(get_class_vars('User'));
echo '<br>';
print_r(get_class_methods('User'));
echo '<br>';


//Use the get_class function to find out the class the object is based on.
echo 'The class is ' .get_class($user_one);



?>

<html lang="en">
<head>
    <title>PHP OOP Tutorial</title>
</head>
<body>

</body>
</html>

