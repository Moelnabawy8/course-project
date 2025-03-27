<?php
$title = "Profile";
include "layouts/header.php";
include "layouts/nav.php";
?>

<div class="container profile-container">
    <div class="row justify-content-center">
        <div class="col-md-8 profile-form">
            <form action="post/profile_post.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-12 text-center">
                        <div class="profile-image-container">
                            <img src="images/users/<?= $_SESSION['user']->image; ?>" alt="" class="profile-image">
                            <input type="file" name="image" class="form-control file-input" id="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">الاسم:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['user']->name ?>" >
                    <?php 
                    if (!empty($_SESSION['errors']['name'])) {
                        echo $_SESSION['errors']['name'];
                    }
                    
                    ?>
                </div>
                <div class="form-group">
                    <label for="gender">النوع:</label>
                    <select class="form-control" name="gender" id="gender" >
                        <option <?php if ($_SESSION['user']->gender=="m") { echo "selected"; } ?> value="ذكر">ذكر</option>
                        <option <?php if ($_SESSION['user']->gender=="f") { echo "selected"; } ?> value="أنثى">أنثى</option>
                    </select>
                    <?php 
                    if (!empty($_SESSION['errors']['gender'])) {
                        echo $_SESSION['errors']['gender'];
                    }
                    
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">البريد الإلكتروني:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $_SESSION['user']->email ?>" >
                    <?php 
                    if (!empty($_SESSION['errors']['email'])) {
                        echo $_SESSION['errors']['email'];
                    }
                    
                    ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "layouts/footer.php"; ?>

<style>
    .profile-image-container {
        width: 150px;
        height: auto;
        border-radius: 50%;
        overflow: visible;
        margin: 0 auto 20px;
    }

    .profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .file-input {
        width: 70%; /* تعديل عرض حقل input */
        margin: 10px auto; /* إضافة مسافة بين حقل input والصورة */
    }
</style>