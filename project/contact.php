<?php 

$title="Contact Us";
include_once 'layouts/header.php'; 
include_once 'layouts/nav.php'; 
include_once 'layouts/breadcrumb.php'; 
include_once "app/services/mail.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $mail = new Mail($_POST["email"], $_POST['subject'], $_POST['message']);
    $mailresult = $mail->send();
    if ($mailresult) {
        echo "<div class='alert alert-success'>Message sent successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to send message. Please try again.</div>";
    }
}
?>

<!-- Contact Area Start -->
<div class="contact-us ptb-95">
    <div class="container">
        <div class="row">
            <!-- Contact Form Area Start -->
            <div class="col-lg-6">
                <div class="small-title mb-30">
                    <h2>Contact Form</h2>
                    <p>Our Beautiful Website</p>
                </div>
                <form id="contact-form" action="" method="post">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <input name="name" placeholder="Full Name" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form-style mb-20">
                                <input name="email" placeholder="Email Address" type="email" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-form-style mb-20">
                                <input name="subject" placeholder="Subject" type="text" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="contact-form-style">
                                <textarea name="message" placeholder="Message" required></textarea>
                                <button name="send" class="submit" type="submit">SEND MESSAGE</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="form-messege"></p>
            </div>
            <!-- Contact Form Area End -->

            <!-- Contact Address Start -->
            <div class="col-lg-6">
                <div class="small-title mb-30">
                    <h2>Contact Address</h2>
                    <p>Our Beautiful Website</p>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information mb-30">
                            <h4>Our Address</h4>
                            <p>Egypt Mansoura Mit Ghamer</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information contact-mrg mb-30">
                            <h4>Phone Number</h4>
                            <p><a href="tel:01016233627">0101 6233 627</a></p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-information contact-mrg mb-30">
                            <h4>Web Address</h4>
                            <p><a href="mailto:moelnabawy904@gmail.com">moelnabawy904@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Address End -->
        </div>
    </div>
</div>

<?php include_once 'layouts/footer.php'; ?>
