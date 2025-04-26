<?php
session_start();
$title = "profile";

include_once "layouts/header.php";
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

                                        <input type="text" name="first-name" placeholder="First Name" value="Mohamed" readonly>
                                        <input type="text" name="last-name" placeholder="Last Name" value="Nabawy" readonly>
                                        <input type="email" name="email" placeholder="Email" value="nabowy@example.com" readonly>
                                        <input type="text" name="phone" placeholder="Phone" value="01012345678" readonly>

                                        <div class="button-box">
                                            <a href="edit-profile.php" class="btn btn-primary" style="margin-top: 10px; padding: 10px 20px; display: inline-block;">Edit Profile</a>
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