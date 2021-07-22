<?php

// When we go to the root of the site, the framework executes the 'index()' method inside the class 'Home'
// We see the results in the browser
// It is good practice to create a subfolder for each controller's views.
// Therefore 'Home.php' in the 'app/Controllers' folder has a folder 'Home' in the 'Views' folder.
// It is also good practice to match the name of the view file to the name of the method in the controller.
// Therefore the 'index()' method in 'Home.php' has a corresponding 'index.php' file in the 'Views/Home' folder.
// To display the view file 'index.php' in 'Views/Home' folder we call the 'view()' method passing in the path.
// This returns the string 'Home/index.php' so can be echoed out directly.
// The view function is not part of standard php, it is part of the framework.
// It is inherited from the parent controller 'BaseController'.
// When we create a class extending BaseController it inherits all of its methods.
// When calling the 'view()' function, the file extension, in this case '.php' is optional.
namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view("Home/index");
	}
}
