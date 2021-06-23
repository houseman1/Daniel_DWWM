<?php

session_start();

$contact_nom = $_SESSION['nom'];
echo $contact_nom;
echo "<br>";

$contact_prenom = $_SESSION['prenom'];
echo $contact_prenom;
echo "<br>";

$contact_dob = $_SESSION['dob'];
echo $contact_dob;
echo "<br>";

$contact_address = $_SESSION['address'];
echo $contact_address;
echo "<br>";

$contact_postcode = $_SESSION['postcode'];
echo $contact_postcode;
echo "<br>";

$contact_town = $_SESSION['town'];
echo $contact_town;
echo "<br>";

$contact_email = $_SESSION['email'];
echo $contact_email;
echo "<br>";

$contact_subject = $_SESSION['subject'];
echo $contact_subject;
echo "<br>";

$contact_question = $_SESSION['question'];
echo $contact_question;
echo "<br>";

?>
