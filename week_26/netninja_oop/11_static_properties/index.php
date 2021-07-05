<?php

//STATIC PROPERTIES
//A static property or method can be accessed directly from the class but not by an instance of the class.
//This is useful for mathematical calculations such as pi or calculating the radius of a circle.

class Weather
{
    public static $temp_conditions = ['cold', 'mild', 'warm'];

    public static function celsius_to_farenheit($c)
    {
        return $c * 9 / 5 + 32;
    }

    //'self' refers to the class not to an instance
    public static function determine_temp_condition($f)
    {
        if($f < 40){
            return self::$temp_conditions[0];
        } elseif ($f < 70)
        {
            return self::$temp_conditions[1];
        } else
        {
            return self::$temp_conditions[2];
        }
    }
}

//If not using static properties:
//Remove the word static above for this code to work.
//print_r instead of echo because it is an array
//This is long-winded for what is essentially a utility class.
//We don't need the instance.  We are not passing any data inside the class
$weather_instance = new Weather();
print_r($weather_instance->temp_conditions);

//To access it directly without using an instance:
//We add the word static to the property and methods above.
//This would throw an error if the property $temp_conditions was private.
print_r(Weather::$temp_conditions);

//Display the conversion of 20 degrees celsius to farenheit.
echo Weather::celsius_to_farenheit(20) . '<br>';

//Display the current weather conditions depending on the temperature passed to the method.
echo Weather::determine_temp_condition(20) . '<br>';
echo Weather::determine_temp_condition(50) . '<br>';
echo Weather::determine_temp_condition(80) . '<br>';

?>



<html lang = en>
<head>
    <title>PHP OOP Tutorials</title>
</head>
<body>

</body>
</html>
