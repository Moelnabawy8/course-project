<?php
$title = "About Us";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/Product.php";
include_once "app/models/User.php";

// إنشاء كائن جديد من الـ User
$user = new User();
$user->setStatus(1);
$resultUsers = $user->read();

// تخزين البيانات في متغير واحد لتجنب القراءة المتكررة
$users = [];
if ($resultUsers) {
    $users = $resultUsers->fetch_all(MYSQLI_ASSOC);
}
?>
<!-- About Us Area Start -->
<div class="about-us-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 d-flex align-items-center">
                <div class="overview-content-2">
                    <h4>Welcome To</h4>
                    <h2>Our Store!</h2>
                    <p class="peragraph-blog">Hay Users.</p>
                    <p>Thats a beautiful store.</p>
                    <div class="overview-btn mt-40">
                        <img src="assets/img/icon-img/signature.png" alt="Candidate Signature">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="overview-img text-center">
                    <a href="#">
                        <img src="assets/img/banner/about-us.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Area End -->

<!-- Team Area Start -->
<div class="team-area pt-95 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-50">
            <div class="section-title-wrap style-two text-center">
                <h3 class="section-title">Team Members</h3>
            </div>
        </div>
        <div class="row">
            <?php
            if (!empty($users)) {
                foreach ($users as $user) { ?>
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <a href="#">
                                <img src="assets/img/users/<?php echo $user['image'] ?: 'default.jpg'; ?>" 
                                     alt="<?php echo $user['first_name']; ?>" 
                                     style="max-width: 200px; max-height: 200px; object-fit: cover;">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h4><?php echo $user['first_name']; ?></h4>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Team Area End -->

<!-- Project Area Start -->
<div class="project-count-area gray-bg pt-75 pb-55">
    <div class="container">
        <div class="row">
            <!-- قم بإزالة التكرار هنا، تم عرضها في البداية عند تحميل المستخدمين -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-count text-center mb-30">
                    <div class="count-title">
                        <h2 class="count">360</h2>
                        <span>project done</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Area End -->

<!-- Start Brand Area -->
<div class="brand-logo-area ptb-100">
    <div class="container">
        <div class="brand-logo-active owl-carousel">
            <div class="single-brand-logo">
                <img alt="" src="assets/img/brand-logo/1.jpg">
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->

<?php include_once "layouts/footer.php"; ?>
