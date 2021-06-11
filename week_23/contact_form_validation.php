 <?php
 
 $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $optradio = $_POST["optradio"];
    $ddn = $_POST["ddn"];
    $codeP = $_POST["codeP"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $question = $_POST["question"];
    if(isset($_POST["jaccepte"])){
    $jaccepte = $_POST["jaccepte"];
    }

    var_dump($question);

    $error_counter = 0;

    if(empty($nom)){
        $error_nom = "non-validé";
        $error_counter++;
    }

    if(empty($prenom)){
        $error_prenom = "non-validé";
        $error_counter++;
    }

    if(empty($ddn)){
        $error_ddn = "non-validé";
        $error_counter++;
    }


    if(empty($codeP) || preg_match("~^[0-9]{5}$~", $codeP) == 0){
        $error_codeP = "non-validé";
        $error_counter++;
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "non-validé";
        $error_counter++;
    }

    if(empty($sujet)){
        $error_sujet = "non-validé";
        $error_counter++;
    }

    if(empty($question)){
        $error_question = "non-validé";
        $error_counter++;
    }

    if(!isset($_POST["jaccepte"])){
        $error_jaccepte = "non-validé";
        $error_counter++;
    }

    if($error_counter === 0){
        include "../views/successfully_uploaded.php";
    } else {
        include "../views/contact.php";
    }
?>