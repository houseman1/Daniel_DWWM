<?php

class Person
{
   public $firstName;
   public $lastName;
   public $gender;

   public function __construct($firstName, $lastName, $gender = 'f')
   {
       $this->firstName = $firstName;
       $this->lastName = $lastName;
       $this->gender = $gender;
   }
   public function sayHello()
   {
       return "Hello my name is ". $this->firstName." ".$this->lastName;
   }

   public function  getGender()
   {
       return $this->gender;
   }
}

$tom = new Person('Tom', 'Ben', 'm');
$jane = new Person('Jane', 'Ben');

echo $tom->sayHello();
echo "\n";
echo $jane->sayHello().". Gender: ".$jane->getGender();
echo "\n";
