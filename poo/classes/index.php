<?php

require_once "Employe.php";
require_once "Agence.php";


/*$user = new User('Dan', 50);
// Change the name and age parameters using the '__set()' Magic Method
$user->__set('name', 'Peter');
// Display the name property using the '__get()' Magic Method
echo $user->__get('name');*/


//Instanciate new employees
$employee_one = new Employe('Christmas', 'Mary', '2000-09-04', 'Big Cheese', '50000', 'Board of Directors', 'levallois', true);
$employee_two = new Employe('Time', 'Justin', '2003-09-04', 'Boss', "40000", 'Production', 'levallois', true);
$employee_three = new Employe('Atoe', 'Tom', '2008-09-04', 'Gaffer', "30000", 'Production', 'london', false);
$employee_four = new Employe('Cited', 'Felix', '2021-07-06', 'General Dogsbody', "10000", 'Production', 'washington', false);
$employee_five = new Employe('Banks', 'Robin', '2007-09-04', 'Accountant', "35000", 'Accounting', 'london', false);

//Exercise 2 result:
//Display how long the employee has been in the company.
$employee_one->determine_duree();
$employee_two->determine_duree();
$employee_three->determine_duree();
$employee_four->determine_duree();
$employee_five->determine_duree();

//Exercise 3 result:
//Display the salary with bonuses
$employee_one->determine_prime();
$employee_two->determine_prime();
$employee_three->determine_prime();
$employee_four->determine_prime();
$employee_five->determine_prime();

//Instanciate agencies
$london = new Agence('MI6', '85 Albert Embankment', 'SE1 7TP', 'London', false);
$washington = new Agence('FBI', '935 Pennsylvania Avenue', '20535-001', 'Washington', false);
$levallois = new Agence('DGSI', '84 Rue de Villers', '92300', 'Levallois-Perret', true);

// Create an array of employee objects
// Loop through the array and use the getRefAgence to assign the 'ref_agence' value to the variable '$ref'.
// Use the setRefAgence to assign the instance of the Agence class to the 'ref_agence' variable of the Employe class
// An object (from Agence) inside another object (from Employe)

$employee = array($employee_one, $employee_two, $employee_three, $employee_four, $employee_five);

foreach ($employee as $emp) {

    $ref = $emp->getRefAgence();

    switch ($ref) {
        case 'london':
            $ag = $london;
            break;

        case 'washington':
            $ag = $washington;
            break;

        case 'levallois':
            $ag = $levallois;
            break;
    }

    $office = array($london, $washington, $levallois);



    $emp->setRefAgence($ag);
    $emp->agence();











}

//$employee_one->setRefAgence($london);
//$employee_one->agence();

//$employee_four->setRefAgence($washington);
//$employee_four->agence();
//var_dump($employee_one);
//var_dump($employee_four);

