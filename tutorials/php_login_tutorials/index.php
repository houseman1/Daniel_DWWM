<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="login.php" method="POST"><!--login form-->
            <h2>LOGIN</h2>

            <!--check for errors using $_GET-->
            <?php if(isset($_GET['error'])) { ?>
                <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php } ?>

            <label>User Name</label>
            <input type="text" name="username" placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit">Login</button>

        </form><!--end login form-->
    </body>
</html>