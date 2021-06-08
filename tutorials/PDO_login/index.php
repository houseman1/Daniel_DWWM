<?php

include_once ("config.php");

//'$con = config::connect();'  assigns the connection configuration to the object '$con'.
//'connect()' is a static function of the 'config' class.  $con is a PDO object.
//A class is a template for objects, and an object is an instance of class.
//See config.php
$con = config::connect();

//FUNCTIONS-----------------------------------------------
//fetch_records-------------------------------------------
function fetch_records($con)
{
    $query = $con->prepare("
    
        SELECT * FROM users
    
    ");

    $query->execute();

    return $query->fetchAll();
}
//END OF FUNCTIONS----------------------------------------


    $results_array = fetch_records($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <!--https://www.youtube.com/watch?v=5p7YwbEf8Y8-->
        <title>Login Register Project Using PDO</title>
    </head>
    <body>
        <h1>Login Register Project</h1>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>

        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php
                //foreach ($array as $value)
                //Foreach loop: for every loop iteration, the value of the current array element is assigned to $value
                //and the array pointer is moved by one, until it reaches the last array element.
                foreach($results_array as $user_value)
                {?>
                   <tr>
                       <td> <?php echo $user_value['username']; ?> </td>
                       <td> <?php echo $user_value['email']; ?> </td>
                   </tr>

                <?php
                }
                ?>
        </table>
    </body>
</html>
