<?php

//LOGIN FORM -----------------------------------------------------------------------------------------------------------
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


//REGISTRATION FORM ----------------------------------------------------------------------------------------------------

if(isset($_POST['register']))
{
    //Remove HTML tags from the submitted name and assign the value to the string variable '$register_nom.
    $register_nom = filter_var($_POST["nom"], FILTER_SANITIZE_STRING);

    //Repeat the process for each submission
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
        // Remove all illegal characters from email
        $email = filter_var($register_email, FILTER_SANITIZE_EMAIL);
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
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


    //count errors and log in if there are none
    if($register_error_count === 0)
    {
        include "login_process.php";
    } else
    {
        include "../views/register.php";
    }
}


//CONTACT FORM ---------------------------------------------------------------------------------------------------------

if(isset($_POST['contact']))
{
    //Remove HTML tags from submitted strings and assign to variables
    $contact_nom = filter_var($_POST["nom"], FILTER_SANITIZE_STRING);
    $contact_prenom = filter_var($_POST["prenom"], FILTER_SANITIZE_STRING);
    $contact_address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
    $contact_postcode = filter_var($_POST["postcode"], FILTER_SANITIZE_STRING);
    $contact_town = filter_var($_POST["town"], FILTER_SANITIZE_STRING);
    $contact_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $contact_question = filter_var($_POST["question"], FILTER_SANITIZE_STRING);

    //Assign datepicker, radio buttons, select and checkbox to variables
    //datepicker
    $contact_dob = $_POST["dob"];
    //radio buttons
    if(isset($_POST['optradio']))
    {
        $contact_gender = $_POST["optradio"];
    }
    //select
    if(isset($_POST['subject']))
    {
        $contact_subject = $_POST["subject"];
    }
    //checkbox
    if(isset($_POST['jaccepte']))
    {
        $contact_jaccepte = $_POST["jaccepte"];
    }


    //reset the error counter
    $contact_error_count = 0;

    //test nom
    if(empty($contact_nom))
    {
        $contact_nom_error = "Veuillez saisir un nom";
        $contact_error_count++;
    } else
    {
        if(!preg_match( "/^[a-zA-Z-' ]*$/", $contact_nom))
        {
            $contact_nom_error = "Format invalide";
            $contact_error_count++;
        }
    }

    //test prenom
    if(empty($contact_prenom))
    {
        $contact_prenom_error = "Veuillez saisir un prénom";
        $contact_error_count++;
    } else
    {
        if(!preg_match( "/^[a-zA-Z-' ]*$/", $contact_prenom))
        {
            $contact_prenom_error = "Format invalide";
            $contact_error_count++;
        }
    }

    //test date of birth
    if(empty($contact_dob))
    {
        $contact_dob_error = "Veuillez séléctionner votre date de naissance";
        $contact_error_count++;
    }

    //test gender radios
    if(empty($contact_gender))
    {
        $contact_gender_error = "Veuillez saisir votre sexe";
        $contact_error_count++;
    }

    //test address
    if(empty($contact_address))
    {
        $contact_address_error = "Veuillez saisir votre adresse";
        $contact_error_count++;
    } else
    {
        if(!preg_match( "/^[a-zA-Z0-9-' ]*$/", $contact_address))
        {
            $contact_address_error = "Format invalide";
            $contact_error_count++;
        }
    }

    //test postcode
    if(empty($contact_postcode))
    {
        $contact_postcode_error = "Veuillez saisir votre code postal";
        $contact_error_count++;
    } else
    {
        //Postcodes of the form: 'DDDDD'. All digits are used.
        //First two digits indicate the department, and range from 01 to 98, or 00 for army.
        if(!preg_match( "/^(?:[0-8]\d|9[0-8])\d{3}$/", $contact_postcode))
        {
            $contact_postcode_error = "Format invalide";
            $contact_error_count++;
        }
    }

    //test town
    if(empty($contact_town))
    {
        $contact_town_error = "Veuillez saisir votre ville";
        $contact_error_count++;
    } else
    {
        if(!preg_match( "/^[a-zA-Z-' ]*$/", $contact_town))
        {
            $contact_town_error = "Format invalide";
            $contact_error_count++;
        }
    }

    //test email
    if(empty($contact_email))
    {
        $contact_email_error = "Veuillez saisir une adresse e-mail";
        $contact_error_count++;
    } else
    {
        // Remove all illegal characters from email
        $email = filter_var($contact_email, FILTER_SANITIZE_EMAIL);
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $contact_email_error = "Format invalide";
            $contact_error_count++;
        }
    }

    //test subject
    if(empty($contact_subject))
    {
        $contact_subject_error = "Veuillez choisir un sujet";
        $contact_error_count++;
    }

    //test question
    if(empty($contact_question))
    {
        $contact_question_error = "Veuillez saisir votre question";
        $contact_error_count++;
    }

    //checkbox
    if(!isset($_POST['jaccepte']))
    {
        $contact_jaccepte_error = "Non-validé";
        $contact_error_count++;
    }

    //count errors and continue to 'contact_success.php' if there are none
    if($contact_error_count === 0)
    {
        $_SESSION['nom'] = $contact_nom;
        $_SESSION['prenom'] = $contact_prenom;
        $_SESSION['dob'] = $contact_dob;
        $_SESSION['dob'] = $contact_dob;
        $_SESSION['gender'] = $contact_gender;
        $_SESSION['address'] = $contact_address;
        $_SESSION['postcode'] = $contact_postcode;
        $_SESSION['town'] = $contact_town;
        $_SESSION['email'] = $contact_email;
        $_SESSION['subject'] = $contact_subject;
        $_SESSION['question'] = $contact_question;

        header("Location: ../views/contact_success.php");
        //include "../views/contact_success.php";
    } else
    {
        include "../views/contact.php";
    }
}