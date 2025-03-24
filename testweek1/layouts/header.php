<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ; ?> </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
        }

        .login-container {
            margin-top: 50px;
        }

        .login-form-1 {
            padding: 5%;
            background: #fff;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            border-radius: 10px;
        }

        .login-form-1 h3 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .login-form-1 .form-group {
            margin-bottom: 20px;
        }

        .login-form-1 .form-control {
            border-radius: 5px;
        }

        .login-form-1 .btn-primary {
            background: linear-gradient(to right, #ff6e7f, #bfe9ff);
            border: none;
        }

        .login-form-1 .ForgetPwd {
            color: #006400;
            text-decoration: none;
        }
    </style>
</head>

<body>