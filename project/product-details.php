<?php
$title = "Product Details";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/Product.php";
include_once "app/models/User.php";
include_once "app/models/Review.php";
$review = new Review();
$review->setProduct_id($_GET['id']);
$resultReview = $review->read();
$reviews = [];
if ($resultReview) {
    while($row = $resultReview->fetch_object()) {
        $reviews[] = $row;
    }
}

$user = $_SESSION['user'];

if ($_GET) {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $product = new Product();
        $product->setId($_GET['id']);
        $product->setStatus(1);
        $resultProductId = $product->readProductById();
        if ($resultProductId) {
            $product = $resultProductId->fetch_object();
        }
    }
} else {
    header("location: layouts/errors/404.php");
}


?>
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="assets/img/product/<?php echo $product->image ?>" />
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $product->name_en ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $product->reviews_avg) {
                                    echo "<i class='ion-android-star-outline theme-star'></i>";
                                } else {
                                    echo "<i class='ion-android-star-outline'></i>";
                                }
                            }
                            ?></div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?= $product->reviews_count ?> Reviews </li>
                                <li> Add Your Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <span><?= $product->price ?> EGP</span>
                    <!-- 
                            quantity = 0 -> out of stock in danger
                            quantity >= 1 , <= 5 -> instock(qunatity) in warning
                            quantity >5 -> instock in success
                         -->
                    <?php
                    if ($product->quantity == 0) {
                        $message = "Out Of Stock";
                        $color = "danger";
                    } elseif ($product->quantity >= 1 && $product->quantity <= 5) {
                        $message = "In Stock($product->quantity)";
                        $color = "warning";
                    } else {
                        $message = "In Stock";
                        $color = "success";
                    }
                    ?>
                    <div class="in-stock">
                        <p>Available: <span class="text-<?= $color ?>"><?= $message ?></span></p>
                    </div>
                    <p><?= $product->desc_en ?></p>
                    <div class="pro-dec-feature">
                        <!-- specs -->
                        <ul>
                        </ul>
                    </div>
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                        </div>
                        <div class="shop-list-cart-wishlist">
                            <a title="Add To Cart" href="#">
                                <i class="icon-handbag"></i>
                            </a>
                            <a title="Wishlist" href="#">
                                <i class="icon-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Categories:</li>
                            <li><a href="#"><?= $product->categories_name_en; ?>,</a></li>
                            <li><a href="shop.php?sub=<?= $product->subcategory_id; ?>"><?= $product->subcategories_name_en; ?>, </a></li>
                            <li><a href=""><?= $product->brands_name_en; ?></a></li>
                        </ul>
                    </div>

                    <!-- Product Deatils Area End -->
                    <div class="description-review-area pb-70">
                        <div class="container">
                            <div class="description-review-wrapper">
                                <div class="description-review-topbar nav text-center">
                                    <a class="active" data-toggle="tab" href="#des-details1">Description</a>

                                    <a data-toggle="tab" href="#des-details3">Review</a>
                                </div>
                                <div class="tab-content description-review-bottom">
                                    <div id="des-details1" class="tab-pane active">
                                        <div class="product-description-wrapper">
                                            <p><?php echo $product->desc_en ?></p>
                                        </div>
                                    </div>

                                    <div id="des-details3" class="tab-pane">
                                        <?php foreach ($reviews as $review): ?>
                                            <div class="sin-rattings">
                                                <div class="star-author-all">
                                                    <div class="ratting-star f-left">
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <?php if ($i <= $review->value): ?>
                                                                <i class="ion-star theme-color"></i>
                                                            <?php else: ?>
                                                                <i class="ion-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                        <span>(<?= $review->value ?>)</span>
                                                    </div>
                                                    <div class="ratting-author f-right">
                                                        <h3><?= $review->first_name . " " . $review->last_name ?></h3>
                                                        <span><?= $review->created_at ?></span>
                                                    </div>
                                                </div>
                                                <p><?= $review->comment ?></p>
                                            </div>
                                        <?php endforeach; ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-area pb-100">
                        <div class="container">
                            <div class="product-top-bar section-border mb-35">
                                <div class="section-title-wrap">
                                    <h3 class="section-title section-bg-white">Related Products</h3>
                                </div>
                            </div>
                            <div class="featured-product-active hot-flower owl-carousel product-nav">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="assets/img/product/product-1.jpg">
                                        </a>
                                        <span>-30%</span>
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
                                                <h4>
                                                    <a href="product-details.html">Le Bongai Tea</a>
                                                </h4>
                                            </div>
                                            <div class="cart-hover">
                                                <h4><a href="product-details.html">+ Add to cart</a></h4>
                                            </div>
                                        </div>
                                        <div class="product-price-wrapper">
                                            <span>$100.00 -</span>
                                            <span class="product-price-old">$120.00 </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    include_once "layouts/footer.php";
                    ?>