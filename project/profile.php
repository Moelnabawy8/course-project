<?php
// تحديد عنوان الصفحة
$title = "My Account";

// استدعاء ملفات التصميم، التنقل، التحقق من تسجيل الدخول
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/middleware/auth.php";

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

    // التحقق من رفع صورة جديدة
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
        if ($result) {
            $success = "<div class='alert alert-success'> Profile Updated Successfully </div>";
        } else {
            $errors['all'] = " Failed To Update Profile ";
        }
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
                        <!-- باقي البانلز -->
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