<?php

class User
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

   //__GET Magic Method
    //$property is defined in the __set() Magic Method
    public function __get($property)
    {
        //property_exists — Checks if the object or class has a property
        //property_exists(object|string $object_or_class, string $property): bool
        if (property_exists($this, $property))
        {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        //property_exists — Checks if the object or class has a property
        //property_exists(object|string $object_or_class, string $property): bool
        if (property_exists($this, $property))
        {
            $this->$property = $value;
        }
        return $this;
    }
}

// Instanciate the User class
// Pass name and age parameters
$user = new User('Dan', 50);

// Change the name and age parameters using the '__set()' Magic Method
$user->__set('name', 'Peter');

// Display the name property using the '__get()' Magic Method
echo $user->__get('name');