<?php

session_start();

$username = $_SESSION['username'];

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
