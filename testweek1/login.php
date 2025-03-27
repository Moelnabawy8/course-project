<?php
$title="login";
include "layouts/header.php";
include "layouts/nav.php";
if (!empty($_SESSION['user'])) {
    header("location:home.php");
    
}
$users = [
    (object)[
        'id' => 1,
        'name' => 'Mohamed Elnabawy',
        "gender" => 'm',
        'image' => '1.jpg',
        'email' => 'moelnabawy904@gmail.com',
        'password' => 123456
    ],
    (object)[
        'id' => 1,
        'name' => 'moahmed',
        "gender" => 'm',
        'image' => '2.jpg',
        'email' => 'mohamed@gmail.com',
        'password' => 123456
    ],
    (object)[
        'id' => 1,
        'name' => 'esraa',
        "gender" => 'f',
        'image' => '3.jpg',
        'email' => 'esraa@gmail.com',
        'password' => 123456
    ],
];

if ($_POST) {
    $errors = [];
    if (empty($_POST['email'])) {
        $errors['email'] = '<div class="alert alert-danger">email is required</div>';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = '<div class="alert alert-danger">password is required</div>';
    }

    if (empty($errors)) {
        foreach ($users as $index => $user) {
            if ($_POST['email'] == $user->email and $_POST['password'] == $user->password) {
                $_SESSION['user']=$user;
                header('location:home.php');
                die;
            }
            $errors['wrong attempet'] = '<div class="alert alert-danger">email or password is wrong</div>';


        }
    }
}

?>
<div class="container login-container d-flex justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 login-form-1">
            <h3>تسجيل الدخول</h3>
            <form id="loginForm" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder=" البريد الالكتروني *" name="email" value="
                        <?php
                        if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        }  ?>" />
                    <?php
                    if (isset($errors['email'])) {
                        echo $errors['email'];
                    }
                    if (isset($errors['wrong attempet'])) {
                        echo $errors['wrong attempet'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="كلمة المرور *" name="password" />
                    <?php
                    if (isset($errors['password'])) {
                        echo $errors['password'];
                    }
                    if (isset($errors['wrong attempet'])) {
                        echo $errors['wrong attempet'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">نسيت كلمة المرور؟</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "layouts/footer.php" ?>