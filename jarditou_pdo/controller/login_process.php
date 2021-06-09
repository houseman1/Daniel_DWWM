<?php

//start a session to pass login name and password to other pages
session_start();

//Include functions.php
    //connexionBase(), header() and footer()
if (file_exists("functions.php")) {
    include("functions.php");
} else {
    echo "The file functions does not exist";
}

//Assign the connection to the PDO object $db
$db = connexionBase();

//FUNCTIONS-----------------------------------------------

//insert_details()-----------------------------------------
//Insert the details on the registration form into the database.
function insert_details($db, $nom, $prenom, $email, $username, $password, $date_inscrit, $date_dern_conn)
{
    $query = $db->prepare("
    
    INSERT INTO users(nom, prenom, email, username, password, date_inscrit, date_dern_conn)
    
    VALUES(:nom, :prenom, :email, :username, :password, :date_inscrit, :date_dern_conn)
    
    ");

    $query->bindParam(":nom",            $nom);
    $query->bindParam(":prenom",         $prenom);
    $query->bindParam(":email",          $email);
    $query->bindParam(":username",       $username);
    $query->bindParam(":password",       $password);
    $query->bindParam(":date_inscrit",   $date_inscrit);
    $query->bindParam(":date_dern_conn", $date_dern_conn);

    return $query->execute();

}

//check_login($db, $username, $password)------------------
//Check if the username and password already exist.

function check_login($db, $username, $password)
{
    $query = $db->prepare("
 
    SELECT * FROM users WHERE username=:username AND password=:password
 
 ");

    $query->bindParam(":username", $username);
    $query->bindParam(":password", $password);

    $query->execute();

    //check how many rows are returned
    if ($query->rowCount() == 1) {
        //username and password exist
        return true;
    } else {
        //username and password do not exist
        return false;
    }

}

//check_account_exists-----------------------------------
function check_account_exists($db, $nom, $prenom)
{
    $query = $db->prepare("
    
    SELECT * FROM users WHERE nom=:nom AND prenom=:prenom
    
    ");

    $query->bindParam(":nom", $nom);
    $query->bindParam(":prenom", $prenom);

    $query->execute();

    //Check if the username exists.
    //If yes, return false.
    if($query->rowCount() == 1)
    {
        return false;
    }
    else {
        return true;
    }
}


//check_username_exists-----------------------------------
function check_username_exists($db, $username)
{
    $query = $db->prepare("
    
    SELECT * FROM users WHERE username=:username
    
    ");

    $query->bindParam(":username", $username);

    $query->execute();

    //Check if the username exists.
    //If yes, return false.
    if($query->rowCount() == 1)
    {
        return false;
    }
    else {
        return true;
    }
}

//check_email_exists-------------------------------------
function check_email_exists($db, $email)
{
    $query = $db->prepare("
    
    SELECT * FROM users WHERE email=:email
    
    ");

    $query->bindParam(":email", $email);

    $query->execute();

    //Check if the username exists.
    //If yes, return false.
    if($query->rowCount() == 1)
    {
        return false;
    }
    else {
        return true;
    }
}

//test_input()------------------------------------------
//Validate the input and make it secure.
//The strip_tags() function strips a string from HTML, XML, and PHP tags.
//The trim() function removes whitespace and other predefined characters from both sides of a string.
//The stripslashes() function removes backslashes.
//The htmlspecialchars() function converts some predefined characters to HTML entities.

function test_input($string)
{
    $string = strip_tags($string);
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);

    return $string;
}

//END OF FUNCTIONS----------------------------------------



//REGISTER------------------------------------------------

if(isset($_POST['register']))
{
    $db = connexionBase();

    //The 'secure_input' function validates and makes user input secure.
    //The 'password_hash' function hashes the password to make it secure
        //and unreadable in the database.

    $nom = test_input($_POST['nom']);
    $prenom = test_input($_POST['prenom']);
    $email = test_input($_POST['email']);
    $username = test_input($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $date_inscrit = date('Y-m-d');
    $date_dern_conn = date('Y-m-d');

    //validate inputs are not empty
    //'return' prevents the following code being executed
    if($nom == "" || $prenom == "" || $email == "" || $username == "" || $password == "")
    {
        echo "Format invalide";
        return;
    }

    //check if the name already exists using the 'check_nom_exists' function
    //'return' prevents the following code being executed
    if(!check_account_exists($db, $nom, $prenom))
    {
        echo "You already have an account, please login";
        return;
    }


    //check if the username already exists using the 'check_username_exists' function
    //'return' prevents the following code being executed
    if(!check_username_exists($db, $username))
    {
        echo "Username already exists!";
        return;
    }

    //check if email already exists using the 'check_email_exists' function
    //'return' prevents the following code being executed
    if(!check_email_exists($db, $email))
    {
        echo "Email already exists!";
        return;
    }

    //Call the function 'insert_details' to INSERT the users details into the database.
    //Use an 'if' condition to check if the INSERT was successful.
    //If yes, bind the variable '$username' to the variable '$_SESSION'.
    if(insert_details($db, $nom, $prenom, $email, $username, $password, $date_inscrit, $date_dern_conn));
    {
        $_SESSION['username'] = $username;
        header("Location: ../views/client_home.php");
    }

}


//LOGIN-----------------------------------------------------------------------------------------------------------------

if(isset($_POST['login']))
{
    $username = secure_input($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //validate inputs are not empty
    //'return' prevents following code being executed
    if($username == "" || $password == "")
    {
        return;
    }


    if(check_login($db, $username, $password))
    {
        $_SESSION['username'] = $username;
        header("Location: client_home.php");
    }
    else {
        echo "The username and password are incorrect";
    }
}