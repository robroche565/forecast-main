<?php

    require_once '../classes/faculty.class.php';

    
    session_start();
    
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    
    $facultyobj = new Faculty;
    if(isset($_GET['id'])){
        if($facultyobj->delete($_GET['id'])){

            header('location: faculty.php');
        }
    }
?>