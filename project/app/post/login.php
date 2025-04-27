<?php
    session_start();
include_once "../models/User.php";
include_once "../requests/Validation.php";
if (!isset($_POST['login'])) {
    header('location:../../layouts/errors/404.php');
    die;
}
// validation
// email validation
$emailvalidation = new Validation("email", $_POST['email']);
$emailRequiredResult = $emailvalidation->required();
if (empty($emailRequiredResult)) {
    # code...
    $emailRegexResult = $emailvalidation->regex("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/");
    if (!empty($emailRegexResult)) {
        # code...
        $_SESSION["errors"]["email"]["regex"] = $emailRegexResult;
    }
} else {
    # code...
    $_SESSION["errors"]["email"]["Required"] = $emailRequiredResult;
}
// password validation
$passwordvalidation = new Validation("password", $_POST['password']);
$passwordRequiredResult = $passwordvalidation->required();
if (empty($passwordRequiredResult)) {
    # code...
    $passwordRegexResult = $passwordvalidation->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');
    if (!empty($passwordRegexResult)) {
        # code...
        $_SESSION["errors"]["password"]["regex"] = $passwordRegexResult;
    }
} else {
    # code...
    $_SESSION["errors"]["password"]["Required"] = $passwordRequiredResult;
}
// if no errors 
if (empty($_SESSION["errors"])) {
    # code...
    // search in db
    $userobject = new User;
    $userobject->setemail($_POST['email']);
    $userobject->setPassword($_POST['password']);
    $result = $userobject->login();
    if ($result) {
        # code...
        // correct credentials
        header("location:../../profile.php");
        die;
    } else {

        // incorrect credentials
        $_SESSION['wrong-credentials'] = "Wrong credentials";
    }
}
$_SESSION['old']['email'] = $_POST['email'] ?? '';
header('location:../../login.php');
die;
