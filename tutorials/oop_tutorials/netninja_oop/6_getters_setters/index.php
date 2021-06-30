<?php
//GETTERS AND SETTERS

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

    //Getters allow us to access private properties from outside the class.
    //Getters are 'public' to allow us to access them from outside the class.
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    //Setters allow us to change the value of private properties from outside the class.
    //Setters are 'public' to allow us to access them from outside the class.
    public function setEmail($email)
    {
        //Validate the email address using strpos (string position).
        //if '@' is in the string, return an integer between 0 and the length of the
        //string depending on its position.
        //if '@' is not in the string, -1 is returned.
        if(strpos($email, '@') > -1)
        {
            $this->email = $email;
        }
    }
}

$user_one = new User('mario', 'mario@email.com');
$user_two = new User('luigi', 'luigi@email.com');

$user_one->setEmail('yoshi@email.com');

echo $user_one->getEmail()."<br>";
echo $user_two->getEmail();
