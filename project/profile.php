<?php
session_start();

$title = "profile";

include_once "layouts/header.php";
include_once "app/middleware/auth.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
?>
<!-- profile.php -->
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Profile </h4>
                        </a>
                    </div>

                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">

                                        <input type="text" name="first-name" placeholder="First Name" value="<?= $_SESSION['user']->first_name ?>" readonly>
                                        <input type="text" name="last-name" placeholder="Last Name" value="<?= $_SESSION['user']->last_name ?>" readonly>
                                        <input type="email" name="email" placeholder="Email" value="<?= $_SESSION['user']->email ?>" readonly>
                                        <input type="text" name="phone" placeholder="Phone" value="<?= $_SESSION['user']->phone ?>" readonly>

                                        <div class="button-box">
                                            <div class="button-box mt-5">
                                                <a href="edit-profile.php" class="btn btn-primary">Edit Profile</a>
                                            </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>







<?php
include_once "layouts/footer.php";
?>