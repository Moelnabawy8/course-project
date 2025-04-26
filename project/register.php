<?php
session_start();
$title = "Register";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/requests/validation.php";
include_once  'app/models/User.php';
include_once "app/services/mail.php";
if ($_POST) {
    // Email Validation
    $emailValidation = new validation("email", $_POST['email']);
    $emailRequiredResult = $emailValidation->required();
    $emailRegexResult = $emailValidation->regex("/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,6}$/");
    $emailUniqueResult = $emailValidation->unique("users");

    // Phone Validation
    $phoneValidation = new validation("phone", $_POST['phone']);
    $phoneRequiredResult = $phoneValidation->required();
    $phoneRegexResult = $phoneValidation->regex('/^(01[0-9]{1}[0-9]{8})$/');
    $phoneUniqueResult = $phoneValidation->unique("users");

    // Password Validation
    $passwordValidation = new validation("password", $_POST['password']);
    $passwordRequiredResult = $passwordValidation->required();
    $passwordRegexResult = $passwordValidation->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');
    $passwordConfirmationResult = $passwordValidation->confirmed($_POST['password_confirmation']);

    // Success check (لو كله تمام)
    if (
        empty($emailRequiredResult) && empty($emailRegexResult) && empty($emailUniqueResult) &&
        empty($phoneRequiredResult) && empty($phoneRegexResult) && empty($phoneUniqueResult) &&
        empty($passwordRequiredResult) && empty($passwordRegexResult) && empty($passwordConfirmationResult)
    ) {

        // مكان إدخال البيانات لقاعدة البيانات
        $user = new User;
        $user->setfirst_name($_POST['first_name'])
     ->setlast_name($_POST["last_name"])
     ->setemail($_POST["email"])
     ->setphone($_POST["phone"])
     ->setpassword($_POST["password"])
     ->setgender($_POST["gender"]);
        $code = rand(100000, 999999);
        $user->setcode($code);
       $result= $user->create();
     
$_SESSION['code'] = $code;
        $_SESSION['email'] = $_POST['email'];
        // Send verification code to email
        $mail = new Mail($_POST["email"], "Welcome to our website", "<h1>Welcome to our website</h1><p>Your verification code is: $code</p>");
        $mailresult = $mail->send();
        if ($mailresult) {
            # code...
            header("Location: check-code.php");
            
        }
        exit();
    }
    //     $user = new Mail($_POST["email"], "Welcome to our website", "<h1>Welcome to our website</h1><p>Your verification code is: $code</p>");
    //    $mailresult= $user->send();
    //     // Redirect to login page
    //     if ($mailresult) {
    //         # code...
    //         header("Location: login.php");
    //     }
        
    //     exit();
    // }
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
                                        if (!empty($emailRequiredResult)) {
                                            echo "<div class='alert alert-danger'>$emailRequiredResult</div>";
                                        } elseif (!empty($emailRegexResult)) {
                                            echo "<div class='alert alert-danger'>$emailRegexResult</div>";
                                        } elseif (!empty($emailUniqueResult)) {
                                            echo "<div class='alert alert-danger'>$emailUniqueResult</div>";
                                        }
                                        ?>
                                        <input type="text" name="phone" placeholder="Phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
                                        <?php
                                        if (!empty($phoneRequiredResult)) {
                                            echo "<div class='alert alert-danger'>$phoneRequiredResult</div>";
                                        } elseif (!empty($phoneRegexResult)) {
                                            echo "<div class='alert alert-danger'>$phoneRegexResult</div>";
                                        } elseif (!empty($phoneUniqueResult)) {
                                            echo "<div class='alert alert-danger'>$phoneUniqueResult</div>";
                                        }
                                        ?>
                                        <input type="password" name="password" placeholder="Password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                                        <?php
                                        if (!empty($passwordRequiredResult)) {
                                            echo "<div class='alert alert-danger'>$passwordRequiredResult</div>";
                                        } elseif (!empty($passwordRegexResult)) {
                                            echo "<div class='alert alert-danger'>$passwordRegexResult</div>";
                                        } elseif (!empty($passwordConfirmationResult)) {
                                            echo "<div class='alert alert-danger'>$passwordConfirmationResult</div>";
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
include_once "layouts/footer.php";

?>