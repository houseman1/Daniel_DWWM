<?php
function connect_db()
{
   //Variables for connecting to database
   $host = "localhost";
   $base = "jarditou";
   $login= "root";
   $password=""; 
   

   try 
   {    //Connect to database
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
        return $db;
    } 

    //Handle errors
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    }

}
?>