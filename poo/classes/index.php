<?php

require_once "Employe.php";
require_once "Agence.php";

//Instanciate agencies
$london = new Agence('MI6', '85 Albert Embankment', 'SE1 7TP', 'London');


//Instanciate new employees
$employee_one = new Employe('Christmas', 'Mary', '2000-09-04', 'Big Cheese', '50000', 'Board of Directors', 'london');
$employee_two = new Employe('Time', 'Justin', '2003-09-04', 'Boss', "40000", 'Production', 'london');
$employee_three = new Employe('Atoe', 'Tom', '2008-09-04', 'Gaffer', "30000", 'Production', 'london');
$employee_four = new Employe('Cited', 'Felix', '2021-07-06', 'General Dogsbody', "10000", 'Production', 'london');
$employee_five = new Employe('Banks', 'Robin', '2007-09-04', 'Accountant', "35000", 'Accounting', 'london');

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

//Exercise 5 result:
//Display l'agence de l'employe
$employee_one->agence();

