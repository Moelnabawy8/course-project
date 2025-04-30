<?php 
session_start();
unset($_SESSION['user']);
if (isset($_COOKIE['remeber_me'])) {
    setcookie("remeber_me", "", time() - 3600, "/"); // delete cookie
}
header("location: ../../login.php")
?>