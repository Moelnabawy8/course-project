<?php
include_once "app/requests/validation.php";
$title = "Register";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
if ($_POST) {

    $emailValidation = new validation("email", $_POST['email']);
    $emailRequiredResult = $emailValidation->required();
    if (empty($emailRequiredResult)) {
        $emailReqexResult = $emailValidation->regx("/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,6}$/");
        if (empty($emailReqexResult)) {
            $emailUniqueResult = $emailValidation->unique("users");
            if (empty($emailUniqueResult)) {
                //no validation errors
            }
        }
    }
    $phoneValidation = new validation("phone", $_POST['phone']);
    $phoneRequiredResult = $phoneValidation->required();
    if (empty($phoneRequiredResult)) {
        $phoneReqexResult = $phoneValidation->regx('/^(01[0-9]{1}[0-9]{8})$/');
        if (empty($phoneReqexResult)) {
            $phoneUniqueResult = $phoneValidation->unique("users");
            if (empty($phoneUniqueResult)) {
                //no validation errors
            }
        }
    }
    $passwordValidation = new validation("password", $_POST['password']);
    $passwordRequiredResult = $passwordValidation->required();
    if (empty($passwordRequiredResult)) {
        $passwordReqexResult = $passwordValidation->regx('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');
        if (empty($passwordReqexResult)) {
            $passwordUniqueResult = $passwordValidation->confirmed($_POST['password_confirmation']);
            if (empty($passwordUniqueResult)) {
                if (isset($_POST['password_confirmation']) && $_POST['password'] === $_POST['password_confirmation']) {
                    // Password and confirmation match, no validation errors
                } else {
                    $passwordUniqueResult = "Password confirmation does not match or is missing.";
                }
            }
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

                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content" class=active>
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <input type="text" name="first_name" placeholder="First Name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                                        <input type="email" name="email" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                                        <?php
                                        if (isset($emailRequiredResult) && !empty($emailRequiredResult)) {
                                            echo "<div class='alert alert-danger'>$emailRequiredResult</div>";
                                        }
                                        if (isset($emailReqexResult) && !empty($emailReqexResult)) {
                                            echo "<div class='alert alert-danger'>$emailReqexResult</div>";
                                        }
                                        if (isset($emailUniqueResult) && !empty($emailUniqueResult)) {
                                            echo "<div class='alert alert-danger'>$emailUniqueResult</div>";
                                        }
                                        ?>
                                        <input type="text" name="phone" placeholder="Phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                                        <?php
                                        if (isset($phoneRequiredResult) && !empty($phoneRequiredResult)) {
                                            echo "<div class='alert alert-danger'>$phoneRequiredResult</div>";
                                        }
                                        if (isset($phoneReqexResult) && !empty($phoneReqexResult)) {
                                            echo "<div class='alert alert-danger'>$phoneReqexResult</div>";
                                        }
                                        if (isset($phoneUniqueResult) && !empty($phoneUniqueResult)) {
                                            echo "<div class='alert alert-danger'>$phoneUniqueResult</div>";
                                        }
                                        ?>
                                        <input type="password" name="password" placeholder="Password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                                        <?php
                                        if (isset($passwordRequiredResult) && !empty($passwordRequiredResult)) {
                                            echo "<div class='alert alert-danger'>$passwordRequiredResult</div>";
                                        }
                                        if (isset($passwordReqexResult) && !empty($passwordReqexResult)) {
                                            echo "<div class='alert alert-danger'>$passwordReqexResult</div>";
                                        }
                                        if (isset($passwordUniqueResult) && !empty($passwordUniqueResult)) {
                                            echo "<div class='alert alert-danger'>$passwordUniqueResult</div>";
                                        }
                                        ?>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation" value="<?php if (isset($_POST['password_confirmation'])) echo $_POST['password_confirmation']; ?>">
                                        <?php if (isset($_POST['password_confirmation']) && $_POST['password'] != $_POST['password_confirmation']) {
                                            echo "<div class='alert alert-danger'>Password confirmation does not match or is missing.</div>";
                                        } ?>
                                        <select name="gender" class="form-control">

                                            <option <?php if (isset($_POST['gender']) && $_POST['gender'] == "m") {
                                                        echo "selected";
                                                    } ?> value="m">Male</option>
                                            <option <?php if (isset($_POST['gender']) && $_POST['gender'] == "f") {
                                                        echo "selected";
                                                    } ?> value="f">Female</option>

                                        </select>
                                        <div class="button-box mt-5">


                                            <button type="submit"><span>Register</span></button>
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
include_once "layouts/footer.php"
?>