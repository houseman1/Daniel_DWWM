<?php
    //Connect to database   
    require "connect_db.php"; 
    $db = connect_db();

    if(isset($_POST['save'])) {
        
    }


    /*if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        //query to update record from 'data' table, or die in case of error
        $mysqli->query("UPDATE data SET name='name', location='location' WHERE id=$id") or die($mysqli->error());
        //set message for Update button
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "warning";
        //redirect user to index.php
        header("location: index.php");
    }*/