<?php

//session_destroy() destroys all of the data associated with the current session
session_destroy();

//redirect to 'index.php'
header("Location: index.php");

?>