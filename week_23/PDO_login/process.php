<?php

session_start();

include_once "config.php";

//FUNCTIONS----------------------------------------------

//insert_details-----------------------------------------
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

//check_login--------------------------------------------
function check_login($con, $username, $password)
{
    $query = $con->prepare("
 
    SELECT * FROM users WHERE username=:username AND password=:password
 
 ");

    $query->bindParam(":username", $username);
    $query->bindParam(":password", $password);

    $query->execute();

    //check how many rows are returned
    if ($query->rowCount() == 1) {
        //confirm username and password exist
        return true;
    } else {
        return false;
    }

}

//test_input---------------------------------------------
function test_input($string)
{
    $string = strip_tags($string);
    $string = str_replace(" ", "", $string);
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);

    return $string;
}


//test_password------------------------------------------
function test_password($string)
{
    $string = md5($string);

    return $string;
}

//update_details-----------------------------------------
function update_details($con, $id, $username, $email, $password)
{
    $query = $con->prepare("

    UPDATE users SET username=:username, email=:email, password=:password

    WHERE id=:id

");

    $query->bindParam(":username", $username);
    $query->bindParam(":email", $email);
    $query->bindParam(":password", $password);
    $query->bindParam(":id", $id);

    //return a Boolean value
    return $query->execute();

}

//check_username_exists----------------------------------
function check_username_exists($con, $username)
{
    $query = $con->prepare("
    
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
function check_email_exists($con, $email)
{
    $query = $con->prepare("
    
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

//END OF FUNCTIONS---------------------------------------



//REGISTER-----------------------------------------------
if(isset($_POST['register']))
{
//Create a new variable '$con'
//Call the static method 'connect()' by using the class name 'config'
//Store the reference of the connection in the variable '$con'
    $con = config::connect();

//The 'test_input' function validates user input - see function below.
//The 'test_password' function hashes the password to make it secure
    //and unreadable in the database - see function below.
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password = test_password($_POST['password']);

//validate inputs are not empty
//'return' prevents the following code being executed
    if($username == "" || $email == "" || $password == "")
    {
        return;
    }

//check if user already exists using the 'check_username_exists' function
//'return' prevents the following code being executed
    if(!check_username_exists($con, $username))
    {
        echo "Username already exists!";
        return;
    }

//check if email already exists using the 'check_email_exists' function
//'return' prevents the following code being executed
    if(!check_email_exists($con, $email))
    {
        echo "Email already exists!";
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



//LOGIN--------------------------------------------------
if(isset($_POST['login']))
{
//Call the static method 'connect()' by using the class name 'config'
//Store the reference of the connection in the variable '$con'
    $con = config::connect();

    $username = test_input($_POST['username']);
    $password = test_password($_POST['password']);

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



//UPDATE-------------------------------------------------
if(isset($_POST['update'])) {
//Create a new variable '$con'
//Call the static method 'connect()' by using the class name 'config'
//Store the reference of the connection in the variable '$con'
        $con = config::connect();

//The 'test_input' function validates user input - see function below.
//The 'test_password' function hashes the password to make it secure
        //and unreadable in the database - see function below.
        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_password($_POST['password']);

//validate inputs are not empty
//'return' prevents following code being executed
        if ($username == "" || $email == "" || $password == "") {
            return;
        }

//check if user already exists using the 'check_username_exists' function
//'return' prevents the following code being executed
    if(!check_username_exists($con, $username))
    {
        echo "Username already exists!";
        return;
    }

//check if email already exists using the 'check_email_exists' function
//'return' prevents the following code being executed
    if(!check_email_exists($con, $email))
    {
        echo "Email already exists!";
        return;
    }

//Assign the current username to the string variable 'current_username'.
        $current_username = $_SESSION['username'];

//Fetch the user id
        $query = $con->prepare("
        
            SELECT * FROM users WHERE username=:username
        
        ");

        $query->bindParam(":username", $current_username);

        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        $id = $result['id'];

//Use an 'if' condition to call the function 'update_details' to UPDATE the users details in the database.
//If the UPDATE was successful, bind the variable '$username' to the variable '$_SESSION'.
        if (update_details($con, $id, $username, $email, $password)) ;
        {
            $_SESSION['username'] = $username;
            header("Location: profile.php");
            echo "Update successful";
        }
    }
?>


