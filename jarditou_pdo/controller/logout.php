<?php

//Destroy all data associated with the current seesion

seesion_destroy();

//Redirect to index.php

header("Location: ../index.php");
