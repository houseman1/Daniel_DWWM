<?php

//session_start() creates a session or resumes the current one based on a session identifier passed via a GET or
//POST request, or passed via a cookie.
session_start();

$username = $_SESSION['username'];

//include "config.php" for connecting to the database
include_once("config.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Details for <?php echo $username; ?></title>
    </head>
    <body>
    <form method="post" action="process.php">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Update" name="update">
    </form>
    </body>
</html>
