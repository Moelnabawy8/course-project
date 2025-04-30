<?php
$title = "Check Code";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/User.php";
$availablePages = ['register','forget'];
// if url has query string
if($_GET){
    // check if key exists
    if(isset($_GET['page'])){
        // check if correct value
        if(!in_array($_GET['page'],$availablePages)){
            header('location:layouts/errors/404.php');die;
        }
    }else{
        header('location:layouts/errors/404.php');die;
    }
}else{
    header('location:layouts/errors/404.php');die;
}

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

    if(empty($errors)){
        $userobject = new User;
        $userobject->setCode($_POST['code']);
        $userobject->setEmail($_SESSION['email']);
        $result = $userobject->checkCode();
        if($result){
            // correct code
            $userobject->setStatus(1);
            date_default_timezone_set('Africa/Cairo');
            $userobject->setEmail_verified_at(date('Y-m-d H:i:s'));
            // update email verified at and status
            $updateResult = $userobject->makeUserVerified();
if ($_GET['page'] == "register") {
    # code...
    header("Location: login.php");
    exit();
}else {
    # code...
    header("Location: reset-password.php");
}
           
        }else{
            $errors['wrong'] = "<div class='alert alert-danger'> Wrong Code </div>";
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