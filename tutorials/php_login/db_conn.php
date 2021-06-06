<?php

    $host = "localhost";
    $login = "root";
    $password = "";

    $base = "test_db";

try
{
    $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
    return $db;
}
catch (Exception $e)
{
    echo 'Erreur : ' . $e->getMessage() . '<br>';
    echo 'N° : ' . $e->getCode() . '<br>';
    die('Connexion au serveur impossible.');

}

?>
