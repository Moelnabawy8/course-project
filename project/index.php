<?php 
$title = "Home";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/models/Product.php";

$product = new Product();
$product->setStatus(1);
$resultProduct = $product->read();
$products = $resultProduct ? $resultProduct->fetch_all(MYSQLI_ASSOC) : [];
?>

<!-- Slider Start -->
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <?php foreach ($products as $product): ?>
            <div class="single-slider bg-img small-slider" 
                style="background-image:url(assets/img/slider/<?php echo $product['slider'] ?>);">
                <div class="container h-100 d-flex align-items-center">
                    <div class="slider-content slider-animated-1">
                        <h1 class="animated"><?php echo $product['desc_en'] ?> <span class="theme-color"><?php echo $product['name_en'] ?></span></h1>
                        <p><?php echo $product['desc_en'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Slider End -->

<!-- Product Area Start -->
<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container">
        <div class="featured-product-active hot-flower owl-carousel product-nav">
            <?php foreach ($products as $product): ?>
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="product-details.php">
                            <img alt="" src="assets/img/product/<?php echo $product['image'] ?>" style="width: 100%; max-height: 200px; object-fit: cover;">
                        </a>
                        <span>-20%</span>
                        <div class="product-action">
                            <a class="action-wishlist" href="#" title="Wishlist">
                                <i class="ion-android-favorite-outline"></i>
                            </a>
                            <a class="action-cart" href="#" title="Add To Cart">
                                <i class="ion-ios-shuffle-strong"></i>
                            </a>
                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content text-left">
                        <div class="product-hover-style">
                            <div class="product-title">
                                <h4><a href="product-details.php"><?php echo $product['name_en'] ?></a></h4>
                            </div>
                            <div class="cart-hover">
                                <h4><a href="product-details.php">+ Add to cart</a></h4>
                            </div>
                        </div>
                        <div class="product-price-wrapper">
                            <span><?php echo $product['name_en'] ?></span>
                            <span class="product-price-old">$120.00 </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Product Area End -->



<!-- News Area Start -->
<div class="blog-area bg-image-1 pt-90 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Latest News</h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-single mb-30">
                        <div class="blog-thumb">
                            <a href="#"><img src="assets/img/product/<?php echo $product['image'] ?>" alt="" style="width: 100%; max-height: 180px; object-fit: cover;" /></a>
                        </div>
                        <div class="blog-content pt-25">
                            <span class="blog-date">14 Sep</span>
                            <h3><a href="#"><?php echo $product['name_en'] ?></a></h3>
                            <p><?php echo $product['desc_en'] ?></p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- News Area End -->

<!-- Newsletter Area Start -->
<div class="newsletter-area bg-image-2 pt-90 pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-45">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Join to our Newsletter</h3>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-6 col-md-10 col-md-auto">
                <div class="footer-newsletter">
                    <div id="mc_embed_signup" class="subscribe-form">
                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll" class="mc-form">
                                <input type="email" name="EMAIL" class="email" placeholder="Your Email Address*" required>
                                <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                <div class="submit-button">
                                    <input type="submit" value="Subscribe" name="subscribe" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Area End -->

<?php 
include_once "layouts/footer.php";
?>
