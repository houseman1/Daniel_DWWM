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



<nav class="navbar navbar-expand-lg navbar-light bg-light"><!--navbar-->
    <a class="navbar-brand" href="#">
        <img src="src/img/bucket.jpg" alt="" width="55" height="60" class="d-inline-block align-text-center">
        Do Stuff, Get Stuff</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tasks</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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



<div>
    <h3>Welcome Doers!</h3>
    <p>To record a completed task please choose your Doer from the dropdown menu above.</p>
</div>



<?=template_footer()?>


