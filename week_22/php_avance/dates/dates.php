<?php
//In the exercises below I have set the DateTimeZone when creating a new instance of DateTime
//It is also possible to set the default timezone used by all date/time functions in the script with:
        // date_default_timezone_set("Europe/Paris");
//I have also assumed that the user is in France, which may not always be the case.
//If needed, the timezone could be changed through user input, i.e. a dropdown menu


// 1.  Affichez la date du jour au format mardi 2 juillet 2019.

//Procedural:
    $date = date("l d F Y");
    echo"Today is ".$date.".";
    echo"<br>";

//Using the DateTime object:
//Create a new instance of the class 'DateTime' into the object '$obj_datetime'
    $obj_datetime = new DateTime(null, new DateTimeZone('Europe/Paris'));

//Assign the format 'l d F Y' to the string variable '$str_todays_date' using the 'format' property of the object '$obj_datetime'
    $str_todays_date = $obj_datetime->format('l d F Y');

//Display the result
    echo "Today is ".$str_todays_date.".";
    echo"<br>";

//----------------------------------------------------------------------------------------------------------------------
// 2.  Trouvez le numéro de semaine de la date suivante : 14/07/2019.

//assign the example date to the variable $str_example_date
    $str_example_date = "2019-07-14";

//Create a new instance of the class 'DateTime' with the parameter '$str_example_date'
//Assign the parameter to the object 'obj_example_date'
    $obj_example_date = new DateTime($str_example_date, new DateTimeZone('Europe/Paris'));

//Assign the 'W' format of the object '$obj_example_date' to the string variable '$str_week' using the 'format' property of the object '$obj_example_date'
    $str_week = $obj_example_date->format("W");

//display the result
    echo "The week number for 14/07/2019 is $str_week.";
    echo"<br>";

//----------------------------------------------------------------------------------------------------------------------
// 3.  Combien reste-t-il de jours avant la fin de votre formation : 29/10/2021

//Assign the course end date to the variable $str_end_date
    $str_end_date = "2021-10-29";

//Create a new instance of the class 'DateTime' as the object '$obj_end_date' with the parameter '$str_end_date'
    $obj_end_date = new DateTime($str_end_date, new DateTimeZone('Europe/Paris'));

//Create a new instance of the class 'DateTime' as the object '$obj_datetime' (current date)
    $obj_datetime = new DateTime(null, new DateTimeZone('Europe/Paris'));

//Compare the difference between today's date ($obj_datetime) and the end date ($obj_end_date) using the property 'diff' of the object 'obj_end_date'
//Display the result in the format '%a' (total number of days as a result of a DateTime::diff()) using the property 'format' of the object 'obj_end_date'
    echo $obj_end_date->diff($obj_datetime)->format("There are %a days until the end of the course.");
    echo"<br>";

//----------------------------------------------------------------------------------------------------------------------
// 4.  Reprenez l'exercice 3, mais traitez le problème avec les fonctions de gestion du timestamp, time() et mktime()

//Assign the course end date to the integer variable $int_end_date (1635465600) using the 'mktime()' function
    $int_end_date = mktime(0,0,0,10, 29, 2021);

//Assign the current date to the integer variable '$int_todays_date' (1622496425) using the 'time()' function
    $int_todays_date = time();

//Subtract $int_todays_date from $int_end_date for the number of seconds until the end of the course
//Divide by 86400 for the number of days (24 hours x 60 minutes x 60 seconds)
        //For the difference in minutes divide by 60
        //For the difference in hours divide by 3600 (60 minute x 60 seconds)
        //For the difference in months divide by 2628000
        //For the difference in years divide by 31536000
//Use floor to round the result down to the nearest integer
    echo "There are ".floor(($int_end_date - $int_todays_date)/86400) . " days until the end of the course.";
    echo"<br>";


//----------------------------------------------------------------------------------------------------------------------
// 5.  Quelle sera la prochaine année bissextile ?

//Create a new instance of the class 'DateTime' as the object '$obj_datetime'
    $obj_datetime = new DateTime(null, new DateTimeZone('Europe/Paris'));

//Assign the 'L' format of the object '$obj_datetime' to the string variable 'isLeapYear
//The 'L' formatter returns 1 if the year is a leap year and 0 if it is not
    $isLeapYear = $obj_datetime->format('L');

//Use a while loop to increment the year until a leap year is found
    while ($isLeapYear == 0) {
        //Add one year to the object $obj_datetime using the 'add' property with a DateInterval of one year as the parameter
        //'P1Y' stands for 'Period One Year'
        $obj_datetime->add(new DateInterval('P1Y'));
        //Assign the 'L' format of the object '$obj_datetime' to the string variable '$isLeapYear'
        //'L' stands for 'Leap'
        $isLeapYear = $obj_datetime->format('L');
    }

//Assign the 'Y' format of the object 'obj_datetime' to the string variable 'result'
    $result = $obj_datetime->format('Y');

//Display the result
    echo "The next leap year will be $result.";
    echo "<br>";

//----------------------------------------------------------------------------------------------------------------------
// 6. Montrez que la date du 17/17/2019 est erronée.

//Assign the date to the string variable '$str_date'
    $str_date = "17/17/2019";

//Break down the string variable '$str_date' into the function 'list' using the function 'explode'.
//Using the separator '/', break the string variable '$str_date' into the day, the month and the year, and assign the values to the string variables '$str_dd', '$str_mm' and '$str_yyyy'
    list($str_dd, $str_mm, $str_yyyy) = explode('/', $str_date);

//Cast the strings to integers and assign them to the integer variables '$int_dd', '$int_mm' and '$int_yyyy'
    $int_dd = (int) $str_dd;
    $int_mm = (int) $str_mm;
    $int_yyyy = (int) $str_yyyy;

//Use the function 'checkdate' to validate the date and display the result
    if (!checkdate($int_mm, $int_dd, $int_yyyy))
    {
        echo"Date ".$str_date." is not valid.";
    } else {
        echo"Date ".$str_date." is valid.";
    }
    echo"<br>";

//Use the same process to validate today's date
    $obj_datetime = new DateTime();
    $str_todays_date = $obj_datetime->format('d/m/Y');

    list($str_dd, $str_mm, $str_yyyy) = explode('/', $str_todays_date);
    $int_dd = (int) $str_dd;
    $int_mm = (int) $str_mm;
    $int_yyyy = (int) $str_yyyy;

    if (!checkdate($int_mm, $int_dd, $int_yyyy))
    {
        echo"Date ".$str_todays_date." is not valid.";
    } else {
        echo"Date ".$str_todays_date." is valid.";
    }
    echo"<br>";


//----------------------------------------------------------------------------------------------------------------------
// 7. Affichez l'heure courante sous cette forme : 11h25.

//Create a new instance of the class 'DateTime' as the object '$obj_datetime'
//Set the timezone of the object 'obj_datetime' to 'Europe/Paris'
    $obj_datetime = new DateTime(null, new DateTimeZone('Europe/Paris'));
            //can also use:  $obj_datetime->setTimeZone(new DateTimeZone('Europe/Paris'));

//Assign the French time format (00h00) 'H\hi' of the object $obj_datetime to the string variable $str_time_now
    $str_time_now = $obj_datetime->format('H\hi');

//Display the result
    echo "L'heure courante : ".$str_time_now;
    echo"<br>";


//----------------------------------------------------------------------------------------------------------------------
//  8.Ajoutez 1 mois à la date courante.

//Create a new instance of the class 'DateTime' as the object '$obj_datetime'
    $obj_datetime = new DateTime(null, new DateTimeZone('Europe/Paris'));

//Assign the format 'day/month/year' of the object '$obj_datetime' to the string variable '$str_date'
    $str_date = $obj_datetime->format('d/m/Y');

//Add one month to the object 'obj_datetime' using the 'add' property of the object '$obj_datetime'
//'P1M' stands for 'Period One Month'
    $obj_datetime->add(new DateInterval('P1M'));

//Assign the format 'day/month/year' of the object '$obj_datetime' to the string variable '$str_date_plus_one'
    $str_date_plus_one = $obj_datetime->format('d/m/Y');

//Display the result
    echo "The current date is ".$str_date.".  In one month it will be ".$str_date_plus_one.".";
?>