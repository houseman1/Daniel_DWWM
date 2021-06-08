<?php


class config {
    public static function connect() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login_project";

        //Connect to the database and catch any errors.
        //Display an error message if errors are found.
        try {
            $con = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$dbname, $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        } catch (PDOException $e)
        {
            echo "Connection failed" . $e->getMessage();
        }
        return $con;
    }
}
