<?php

$title = "forget password";
include_once "layouts/header.php";
include_once "app/middleware/guest.php";

include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/User.php";
include_once "app/requests/Validation.php";
include_once "app/services/mail.php";
// validation 
// required regex 
if ($_POST) {
    $errors = [];
    $emailvalidation = new Validation("email", $_POST['email']);
    $emailRequiredResult = $emailvalidation->required();
    if (empty($emailRequiredResult)) {
        $emailRegexResult = $emailvalidation->regex("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/");
        if (!empty($emailRegexResult)) {
            $errors["email-regex"] = $emailRegexResult;
        }
    } else {
        
        $errors["email-Required"] = $emailRequiredResult;
    }
    // check if email exist in db
    if (empty($errors)) {
        $user = new User();
        $user->setEmail($_POST['email']);
        $result = $user->getUserByEmail();
        if ($result) {
            //correct email
            
            // if exist generate code
            $code = rand(100000, 999999);
            $user->setCode($code);
            $updateResult = $user->updateCodeByEmail();
            if ($updateResult) {
                // save code 
                //send code 
                //header check code
                $mail = new Mail($_POST["email"], "Welcome to our website", "<h1>Welcome to our website</h1><p>Your forget code is: $code</p>");
                $mailresult = $mail->send();
                if ($mailresult) {
                    $_SESSION['email'] = $_POST['email'];
                    header('location:check-code.php?page=forget');die;
                } else {
                    $errors["try_again"] = " try again";
                }
            } else {
                $errors["some-wrong"] = " some thing wrong";
            }
        } else {
            // wrong email
            $errors["email-not-exist"] = " this email not exist";
        }
    }
}



?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> forget password </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">

                                        <input type="email" name="email" placeholder="enter your email address">
                                        <div class="button-box">

                                            <button type="submit"><span>verify email address</span></button>
                                            <?php
                                            if (!empty($errors)) {
                                            
                                                foreach ($errors as  $value) {
                                                    echo "<div class='alert alert-danger'>$value</div>";
                                                }
                                            }


                                            ?>

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