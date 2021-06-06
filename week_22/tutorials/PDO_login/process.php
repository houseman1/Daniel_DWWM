<?php

session_start();

include_once "config.php";

if(isset($_POST['register']))
{
//Create a new variable '$con'
//Call the static method 'connect()' by using the class name 'config'
//Store the reference of the connection in the variable '$con'
    $con = config::connect();
//The FILTER_SANITIZE_STRING filter removes tags and removes or
//encodes special characters from a string.
    $username = test_input($_POST['username']);
    $email = $_POST['email'];
    $password = $_POST['password'];

//validate inputs are not empty
//'return' prevents following code being executed
    if($username == "" || $email == "" || $password == "")
    {
        return;
    }

//Call the function 'insert_details' to INSERT the users details into the database.
//Use an 'if' condition to check if the INSERT was successful.
//If yes, bind the variable '$username' to the variable '$_SESSION'.
    if(insert_details($con, $username, $email, $password));
    {
        $_SESSION['username'] = $username;
        header("Location: profile.php");
    }
}

if(isset($_POST['login']))
{
//Call the static method 'connect()' by using the class name 'config'
//Store the reference of the connection in the variable '$con'
    $con = config::connect();

    $username = $_POST['username'];
    $password = $_POST['password'];

//validate inputs are not empty
//'return' prevents following code being executed
    if($username == "" || $password == "")
    {
        return;
    }


    if(check_login($con, $username, $password))
    {
        $_SESSION['username'] = $username;
        header("Location: profile.php");
    }
    else {
        echo "The username and password are incorrect";
    }
}

function insert_details($con, $username, $email, $password)
{
    $query = $con->prepare("
    
    INSERT INTO users (username, email, password)
    
    VALUES (:username, :email, :password)
    
    ");

    $query->bindParam(":username", $username);
    $query->bindParam(":email", $email);
    $query->bindParam(":password", $password);

    return $query->execute();

}

function check_login($con, $username, $password)
{
 $query = $con->prepare("
 
    SELECT * FROM users WHERE username=:username AND password=:password
 
 ");

    $query->bindParam(":username", $username);
    $query->bindParam(":password", $password);

    $query->execute();

    //check how many rows are returned
    if($query->rowCount() == 1)
    {
        //confirm username and password exist
        return true;
    }
    else {
        return false;
    }

}

?>