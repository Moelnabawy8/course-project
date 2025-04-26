<?php
session_start();
$title = "Check Code";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/User.php";

if ($_POST) {
    $errors = [];

    if (empty($_POST['code'])) {
        $errors['code'] = "Code is required";
    } else {
        if (strlen($_POST['code']) != 6) {
            $errors['code'] = "Code must be 6 digits";
        }
        if ($_POST['code'] < 100000 || $_POST['code'] > 999999) {
            $errors['code'] = "Code must be between 100000 and 999999";
        }
    }

    if (empty($errors)) {
        $userobject = new User();
        $userobject->setEmail($_SESSION['email']);  // لازم نحدد الإيميل عشان نعمل Update بعدين

        if ($userobject->checkCode($_POST['code'])) {
            $userobject->setEmail_verified_at(date("Y-m-d H:i:s"));
            $userobject->setStatus(1);
            $userobject->makeUserVerified();

            header("Location: login.php");
            exit();
        } else {
            $errors['code'] = "Invalid code. Please try again.";
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
                            <h4> check code </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">

                                        <input type="number" name="code" placeholder="code">
                                        <div class="button-box">

                                            <button type="submit"><span>check code</span></button>
                                            <?php
                                            if (!empty($errors)) {
                                                foreach ($errors as $value) {
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