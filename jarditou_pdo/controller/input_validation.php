<?php

//LOGIN FORM -----------
if(isset($_POST['login']))
{
    $login_username = $_POST["username"];
    $login_password = $_POST["password"];

    $login_error_count = 0;

//test username
    if(empty($login_username))
    {
        $login_username_error = "Veuillez saisir un identifiant";
        $login_error_count++;
    } else
    {
        if(!ctype_alnum($login_username))
        {
            $login_username_error = "Format invalide - seuls les lettres et les chiffres sont autorisés";
            $login_error_count++;
        }
    }

//test password
    if (empty($login_password))
    {
        $login_password_error = "Veuillez saisir un mot de passe";
        $login_error_count++;
    }

    if($login_error_count === 0)
    {
        include "login_process.php";
    } else
    {
        include "../views/login.php";
    }
}









//REGISTER FORM -----------

//FUNCTION - validate password -----------
/*function validate_password ($string)
{
    $uppercase = preg_match('@[A-Z]@', $string);
    $lowercase = preg_match('@[a-z]@', $string);
    $number    = preg_match('@[0-9]@', $string);
    $specialChars = preg_match('@[^\w]@', $string);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($string) < 8)
    {
        return true;
    }
}*/

if(isset($_POST['register']))
{
    $register_nom = $_POST["nom"];
    $register_prenom = $_POST["prenom"];
    $register_email = $_POST["email"];
    $register_username = $_POST["username"];
    $register_password = $_POST["password"];

    $register_error_count = 0;

    //test nom
    if(empty($register_nom))
    {
        $register_nom_error = "Veuillez saisir un nom";
        $register_error_count++;
    } else
    {
        if(!preg_match( "/^[a-zA-Z-' ]*$/", $register_nom))
        {
            $register_nom_error = "Format invalide - seuls les lettres, les tirets, les apostrophes et les espaces sont autorisés";
            $register_error_count++;
        }
    }

    //test prenom
    if(empty($register_prenom))
    {
        $register_prenom_error = "Veuillez saisir un prenom";
        $register_error_count++;
    } else
    {
        if(!preg_match( "/^[a-zA-Z-' ]*$/", $register_prenom))
        {
            $register_prenom_error = "Format invalide - seuls les lettres, les tirets, les apostrophes et les espaces sont autorisés";
            $register_error_count++;
        }
    }

    //test email
    if(empty($register_email))
    {
        $register_email_error = "Veuillez saisir une adresse e-mail";
        $register_error_count++;
    } else
    {
        if (!filter_var($register_email, FILTER_VALIDATE_EMAIL))
        {
            $register_email_error = "Format invalide";
            $register_error_count++;
        }
    }

    //test username
    if(empty($register_username))
    {
        $register_username_error = "Veuillez saisir un identifiant";
        $register_error_count++;
    } else
    {
        if(!ctype_alnum($register_username))
        {
            $register_username_error = "Format invalide - seuls les lettres et les chiffres sont autorisés";
            $register_error_count++;
        }
    }

    //test password
    if (empty($register_password))
    {
        $register_password_error = "Veuillez saisir un mot de passe";
        $register_confirm_password_error = "Veuillez confirmer votre mot de passe";
        $register_error_count++;
    } else
    {
        //a minimum of 8 characters
        //at least one uppercase letter
        //at least one number (digit)
        //at least one of the following special characters !@#$%^&*-
        $pattern = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/";

        if(!preg_match($pattern, $register_password))
        {
            $register_password_error = "Format invalide";
            $register_error_count++;
        }
    }

    if($register_error_count === 0)
    {
        include "login_process.php";
    } else
    {
        include "../views/register.php";
    }
}