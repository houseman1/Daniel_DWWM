//PROPERTIES AND METHODS

<?php

    //Class names are capitalised and singular.
    class User
    {

    public $username = 'ryu';
    public $email = 'ryu@email.com';

    public function add_friend()
    {
        //$this = this instance of the class
        return "$this->username added a new friend";
    }

    }
    //Instantiate the class.
    //Create a new object 'User' and store inside the variable '$user_one'.
    $user_one = new User();
    $user_two = new User();

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
