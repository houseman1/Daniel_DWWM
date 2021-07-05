<?php

//FORM VALIDATION

require ('user_validator.php');

//When the submit button is clicked, create a new instance of the UserValidator class.
//The instance will have the parameters from $_POST: the username and email from the inputs.
//The 'validate_form' function is called and if errors are returned, they are stored in the $errors array.
//Otherwise, an empty array is returned.
if(isset($_POST['submit']))
{
    $validation = new UserValidator($_POST);
    $errors = $validation->validate_form();
    //if $errors is empty save data to db...(add code here)
}

?>

<html lang="en">
<head>
    <title>PHP OOP Tutorials</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="new-user">
        <h2>Create new user</h2>
        <!--$_SERVER['PHP_SELF'] means the current file.
        We want this page/file to deal with the submit.
        When submit is clicked the php code on this page will execute.-->
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <label>Username: </label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>">
            <div class="error">
                <?php echo $errors['username'] ?? '' ?>
            </div>

            <label>Email: </label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?? '' ?>">
            <div class="error">
                <?php echo $errors['email'] ?? '' ?>
            </div>

            <input type="submit" name="submit" value="submit">

        </form>
    </div>
</body>
</html>
