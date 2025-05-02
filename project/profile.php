<?php
// تحديد عنوان الصفحة
$title = "My Account";

// استدعاء ملفات التصميم، التنقل، التحقق من تسجيل الدخول
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/middleware/auth.php";
include_once "app/requests/Validation.php";

// استدعاء موديل المستخدم وإنشاء كائن جديد منه
include_once "app/models/User.php";
$user = new User();
$user->setEmail($_SESSION['user']->email); // استخدام الإيميل من الجلسة لتحديد المستخدم

// في حالة الضغط على زر التحديث
if (isset($_POST['update-profile'])) {
    $errors = [];

    // التحقق من أن جميع الحقول مطلوبة
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['phone']) || empty($_POST['gender'])) {
        $errors['all'] = " All Feilds Are Required ";
    }

    // تمرير البيانات للكائن
    $user->setFirst_name($_POST['first_name']);
    $user->setLast_name($_POST['last_name']);
    $user->setPhone($_POST['phone']);
    $user->setGender($_POST['gender']);

    // التحقق من رفع صورة جديدةs
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $user->setImage($_FILES['image']);

        // إعدادات الصورة: الحجم، الامتدادات
        $maxsize = 2 * 1024 * 1024; // 2MB
        $extension = array('jpg', 'jpeg', 'png', 'gif');

        // إنشاء اسم عشوائي للصورة مع الامتداد المناسب (هنا فيه خطأ: لازم نستخدم امتداد فعلي مش array)
        $photoExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (!in_array($photoExt, $extension)) {
            $errors['image'] = "Invalid image format";
        } elseif ($_FILES['image']['size'] > $maxsize) {
            $errors['image'] = "Image size exceeds 2MB";
        } else {
            $photoName = uniqid() . '.' . $photoExt;
            $photoPath = "assets/img/users/$photoName";

            // حفظ الصورة
            move_uploaded_file($_FILES['image']['tmp_name'], $photoPath);

            // حفظ الاسم الجديد في الكائن وتحديث الجلسة
            $user->setImage($photoName);
            $_SESSION['user']->image = $photoName;
        }
    }

    // إذا لم يكن هناك أخطاء يتم حفظ البيانات
    if (empty($errors)) {
        $result = $user->updateProfile();
        $_SESSION['user']->first_name = $_POST['first_name'];
        $_SESSION['user']->last_name = $_POST['last_name'];
        $_SESSION['user']->phone = $_POST['phone'];
        $_SESSION['user']->gender=$_POST['gender'];
        if ($result) {
            $success = "<div class='alert alert-success'> Profile Updated Successfully </div>";
        } else {
            $errors['all'] = " Failed To Update Profile ";
        }
    }
}
if(isset($_POST['update-password'])){
    
    // 123456 -> hashed -> compare -> 23153s2f1g32fds2fg1h32
    // 23153s2f1g32fds2fg1h32 
    // old password => required , regex , correct=>database
    // new password => required , regex , confirmed
    // confrim password => required


    // if no validation errors
    $user->setPassword($_POST['new_password']);
    $result = $user->updatePassword();
    if($result){
        // print success message
        $success = "<div class='alert alert-success'> Password Updated Successfully </div>";
    }else{
        // print error
        $errors['all'] = " Failed To Update Password ";
    }

}
// جلب بيانات المستخدم الحالية لعرضها
$result = $user->getUserByEmail();
$user = $result->fetch_object();
?>


<?php include_once "layouts/styles.php"; ?>

<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span>
                                    <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a>
                                </h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>
                                        <?php
                                        if (!empty($errors)) {
                                            foreach ($errors as $key => $error) {
                                                # code...
                                                echo "<div class='alert alert-danger'>$error</div>";
                                            }
                                        }
                                        if (isset($success)) {
                                            echo $success;
                                        }
                                        ?>
                                        <form action="profile.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 offset-4 text-center">
                                                            <img src="assets/img/users/<?php echo $user->image    ?>" alt="" id="image" class="profile-image" onclick="openModal(this)">
                                                            <input type="file" name="image" id="file" class="d-none">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mt-5">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name" value="<?php echo $user->first_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 mt-5">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" value="<?php echo $user->last_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Phone</label>
                                                        <input type="number" name="phone" value="<?php echo $user->phone; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label for="Gender"> Gender </label>
                                                        <select name="gender" id="Gender" class="form-control">
                                                            <option <?php if ($user->gender == "m") {
                                                                        # code...
                                                                        echo "selected";
                                                                    }   ?> value="m">Male</option>
                                                            <option <?php if ($user->gender == "f") {

                                                                        # code...
                                                                        echo "selected";
                                                                    } ?> value="f">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="update-profile">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Password</h4>
                                            <h5>Your Password</h5>
                                        </div>
                                        <form  method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Old Password</label>
                                                        <input type="password" name="old_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Password Confirm</label>
                                                        <input type="password" name="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="update-password">Update Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries </a></h5>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Address Book Entries</h4>
                                        </div>
                                        <div class="entries-wrapper">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-info text-center">
                                                        <p>Farhana hayder (shuvo) </p>
                                                        <p>hastech </p>
                                                        <p> Road#1 , Block#c </p>
                                                        <p> Rampura. </p>
                                                        <p>Dhaka </p>
                                                        <p>Bangladesh </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                    <div class="entries-edit-delete text-center">
                                                        <a class="edit" href="#">Edit</a>
                                                        <a href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>4</span> <a href="wishlist.html">Modify your wish list </a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- my account end -->

<?php
include_once "layouts/scripts.php";
include_once "layouts/footer.php";
?>