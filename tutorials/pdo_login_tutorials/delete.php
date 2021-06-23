<?php

//session_start() creates a session or resumes the current one based on a session identifier passed via a GET or
//POST request, or passed via a cookie.
session_start();

//include "config.php" for connecting to the database
include_once ("config.php");

//'$con = config::connect();'  assigns the connection configuration to the object '$con'.
//'connect()' is a static function of the 'config' class.
//See config.php
$con =  config::connect();

$username = $_SESSION['username'];

$query = $con->prepare("

    DELETE FROM users WHERE username=:username

");

$query->bindParam(":username", $username);

$query->execute();

header("Location: index.php");

