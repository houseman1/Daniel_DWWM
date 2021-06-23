<?php

session_start();

include_once ("config.php");

echo "Welcome " . $_SESSION['username'];
echo "<br>";

echo "<a href='logout.php'>Logout</a>";
echo "<br>";

echo "<a href='update.php'>Update</a>";
echo "<br>";

echo "<a href='delete.php'>Delete</a>";

?>