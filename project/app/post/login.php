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
        $user = $result->fetch_object();
        if ($user->status == 1) {
            if (isset($_POST['remeber_me'])) {
                setcookie("remeber_me", $_POST['email'], time() + (24*60 *60)*12*30, "/"); // 86400 = 1 month
            }
            $_SESSION['user'] = $user ;
            


            # code...

            header('location:../../index.php');
            die;
        } elseif ($user->status == 0) {
            # code...
            header('location:../../check-code.php');
            die;
        } else {
            # code...
            $_SESSION["errors"]["email"]['blocked'] = "this account is blocked";
        }
    }
} else {

    // incorrect credentials
    $_SESSION["errors"]["email"]['wrong'] = "failed attempet";}

$_SESSION['old']['email'] = $_POST['email'] ?? '';
header('location:../../login.php');
die;
