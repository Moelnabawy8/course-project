<?php
$title = "reset password";
include_once "layouts/header.php";
include_once "app/middleware/guest.php";
if(empty($_SESSION['user-email'])){
    header('location:login.php');die;
}
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/User.php";
include_once "app/requests/Validation.php";
if ($_POST) {
    // validation on password
    $errors = [];
    $passwordvalidation = new Validation("password", $_POST['password']);
    $passwordRequiredResult = $passwordvalidation->required();
    if (empty($passwordRequiredResult)) {
        $passwordRegexResult = $passwordvalidation->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');
        if (!empty($passwordRegexResult)) {
            $errors["password-regex"] = $passwordRegexResult;
        }
    } else {
        $errors["password-Required"] = $passwordRequiredResult;
    }
    // check if password and confirm password are equal
    if (empty($errors)) {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errors["password-not-equal"] = "password and confirm password are not equal";
        }
    }
    // check if there is no errors
    if (empty($errors)) {
        $user = new User();
        $user->setEmail($_SESSION['email']);
        $user->setPassword($_POST['password']);
        $result = $user->updatePasswordByEmail();
        if ($result) {
            $success = "password updated successfully";
            // password updated
            header('Refresh:5;url=login.php');
        } else {
            // some thing wrong
            $errors["some-wrong"] = " some thing wrong";
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
                            <h4> reset password </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <?php 
                                        if (isset($success)) {
                                            # code...
                                            echo " <div class='alert alert-success'>$success</div></div>";

                                        }
                                        
                                        ?>

                                        <input type="password" name="password" placeholder="password">
                                        <input type="password" name="confirm_password" placeholder="confirm password">
                                        <?php
                                        if (!empty($errors)) {
                                            foreach ($errors as $key => $value) {
                                                echo "<div class='alert alert-danger'>$value</div>";
                                            }
                                        }
                                        ?>
                                        <div class="button-box">

                                            <button type="submit"><span>confirm</span></button>
                                           
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