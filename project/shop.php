<?php
$title = "shop";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/models/Product.php";
include_once "app/models/Brand.php";
include_once "app/models/Category.php";
include_once "app/models/Subcategory.php";
$product = new Product();
$product->setStatus(1);
if ($_GET) {
    if (isset($_GET['subcategory_id']) && is_numeric($_GET['subcategory_id'])) {
        $subcategory = new Subcategory();
        $subcategory->setId($_GET['subcategory_id']);
        $resultSubcategoriesid=$subcategory->readSubcategoryById();
        if ($resultSubcategoriesid) {
            $product->setSubcategory_Id($_GET['subcategory_id']);
            $resultProducts = $product->readBySubcategory();
        }else {
            header("location: layouts/errors/404.php");
        }
        
    }else {
       header("location: layouts/errors/404.php");
    }

   
    
}else {
    $resultProducts = $product->read();
}

$brand = new Brand();
$brand->setStatus(1);
$resultBrands = $brand->read();
$category = new Category();
$category->setStatus(1);
$resultCategories = $category->read();
$subcategory = new Subcategory();
$subcategory->setStatus(1);
$resultSubcategories = $subcategory->read();
?>



<!-- Shop Page Area Start -->
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <ul class="view-mode">
                            <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                            <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                        </ul>

                    </div>
                    <div class="product-sorting-wrapper">

                        <div class="product-show shorting-style">
                            <label>Sort by:</label>
                            <select>
                                <option value="">Default</option>
                                <option value=""> Name</option>
                                <option value=""> price</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            <?php
                            if ($resultProducts) {
                                $products = $resultProducts->fetch_all(MYSQLI_ASSOC);
                                foreach ($products as $key => $product) {
                            ?>

                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.php?id=<?php echo $product['id'] ?>">
                                                    <img alt="" src="assets/img/product/<?php echo $product['image'] ?>" />
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
                                                            <a href="product-details.php?id=<?php echo $product['id'] ?>"><?php echo $product['name_en'] ?></a>
                                                        </h4>
                                                    </div>
                                                    <div class="cart-hover">
                                                        <h4><a href="product-details.php?id=<?php echo $product['id'] ?>">+ Add to cart</a></h4>
                                                    </div>
                                                </div>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo $product['price'] ?></span>
                                                </div>
                                            </div>
                                            <div class="product-list-details?id=<?php echo $product['id'] ?>">
                                                <h4>
                                                    <a href="product-details.php?id=<?php echo $product['id'] ?>"><?php echo $product['name_en'] ?></a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo $product['price'] ?></span>

                                                </div>
                                                <p><?php echo $product['desc_en'] ?></p>
                                                <div class="shop-list-cart-wishlist">
                                                    <a href="#" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    <a href="#" title="Add To Cart"><i class="ion-ios-shuffle-strong"></i></a>
                                                    <a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php


                                }
                            }else {
                                echo "<div class='alert alert-warning text-center w-100' > No products yet </div>";
                            }

                            ?>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Shop By Categories</h4>
                        <div class="shop-catigory">
                            <ul id="faq">
                                <?php
                                if ($resultCategories && $resultSubcategories) {
                                    $categories = $resultCategories->fetch_all(MYSQLI_ASSOC);
                                    $subcategories = $resultSubcategories->fetch_all(MYSQLI_ASSOC);

                                    foreach ($categories as $key => $category) {
                                ?>
                                        <li>
                                            <a data-toggle="collapse" data-parent="#faq" href="#shop-category-<?= $key ?>">
                                                <?= $category['name_en'] ?>
                                                <i class="ion-ios-arrow-down"></i>
                                            </a>
                                            <ul id="shop-category-<?= $key ?>" class="panel-collapse collapse">
                                                <?php
                                                foreach ($subcategories as $subcategory) {
                                                    if ($subcategory['category_id'] == $category['id']) {
                                                ?>
                                                        <li>
                                                            <a href="shop.php?subcategory_id=<?= $subcategory['id']; ?>">
                                                                <?= $subcategory['name_en']; ?>
                                                            </a>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                    <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Price Filter</h4>
                        <div class="price_filter mt-25">
                            <span>Range: $100.00 - 1.300.00 </span>
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Brand</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <?php
                                if ($resultBrands) {
                                    $brands = $resultBrands->fetch_all(MYSQLI_ASSOC);
                                    foreach ($brands as $key => $brand) {
                                ?>
                                        <li><input type="checkbox"><a href="#"><?php echo $brand['name_en'] ?></a></li>
                                <?php
                                    }
                                }

                                ?>


                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page Area End -->
<?php
include_once "layouts/footer.php"
?>