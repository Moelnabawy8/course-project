<?php
session_start();
// if the request is get
if(empty($_POST)){
    header('location:../errors/404.php');die;
}
// if no validation errors
if(empty($errors)){
    print_r($_POST);
    die;
    
    
    // update on session
    $_SESSION['user']->name = $_POST['name'];
    $_SESSION['user']->email = $_POST['email'];
    $_SESSION['user']->gender = $_POST['gender'];
}
// update
if (empty($errors)) {
    $_SESSION['user']->name=$_POST['name'];
    $_SESSION['user']->email=$_POST['email'];
    $_SESSION['user']->gender=$_POST['gender'];
}
$_SESSION['errors'] = $errors;
header('location:../profile.php');
