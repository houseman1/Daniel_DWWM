<?php

//Destroy all data associated with the current seesion

session_destroy();

//Redirect to index.php

header("Location: ../index.php");
