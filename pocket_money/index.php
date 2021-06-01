<?php
if (file_exists("controller/functions.php") )
{
    include("controller/functions.php");
}
else
{
    echo "The file functions does not exist";
}
?>

<?=template_header('Home')?>
<br>
<header class="row">
    <div class="col-6 mx-auto"><!--bucket image-->
        <img src="src/img/bucket.jpg" alt="" height="100" class="d-inline-block align-text-center">
                Do stuff
    </div><!--end bucket image-->
    <div class="col-6 mx-auto"><!--smiley image-->
        <img src="src/img/smiley.png" alt="" height="100" class="d-inline-block align-text-center">
                Get stuff
    </div><!--end smiley image-->
</header>


<nav class="navbar navbar-expand-lg navbar-light bg-secondary"><!--navbar-->
    <a class="navbar-brand text-white" href="#index.php">
        Do Stuff, Get Stuff</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Tasks</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Doers
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Peter</a>
                    <a class="dropdown-item" href="#">Sam</a>
                </div>
            </li>
        </ul>
    </div>
</nav><!--end navbar-->

<main class="col-12"><!--main containing one row containing two columns containing the body of text-->
    <div class="row"><!--row containing two columns-->
        <div class="col-6 bg-light"><!--left column-->
            <div><!--Intro-->
                <h5>Welcome!</h5>
                <p>Do Stuff, Get Stuff is a means to motivate and reward your children for helping you.</p>
                <p>You set the tasks, you set the rewards.</p>
                <p>The children DO the tasks and GET the rewards.</p>
                <p>Everyone's a winner!</p>
                <br>
                <p>Start by setting some tasks and rewards with your children using the 'Tasks' menu above.</p>
                <p>Next, add the children's names using the 'Doers' menu.</p>
                <p>Finally, whenever they complete a task, record it using the Doers menu.</p>
                <br>
                <p>You can add, modify and delete tasks at any time using the 'Tasks' menu.</p>
            </div><!--end intro-->
        </div><!--end left column-->
        <div class="col-6 bg-info text-white"><!--right column-->
            <h3>Right column</h3>
        </div><!--end right column-->
    </div><!--end row containing two columns-->
</main><!--end of main containing one row containing two columns containing the body of text-->

<div class="navbar bg-secondary"></div>


<?=template_footer()?>


