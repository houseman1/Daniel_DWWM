<?php

// There is a file 'app/Views/Tasks/index.php' that matches the controller Tasks

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        return view("Tasks/index");
    }
}