<?php 
$title = "Shop List";
include_once 'layouts/header.php';
include_once 'layouts/nav.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/models/Product.php';
$product= new Product();
$product->setStatus(1);
$resultProducts = $product->read();
include_once "app/models/Category.php";
$category = new Category();
$category->setStatus(1);
$resultCategories = $category->read();
include_once "app/models/Brand.php";
$brand = new Brand();
$brand->setStatus(1);
$resultBrands = $brand->read();
include_once "app/models/SubCategory.php";
$subcategory = new SubCategory();
$subcategory->setStatus(1);
$resultSubCategories = $subcategory->read();

?>
   
		<!-- Shop Page Area Start -->
        <div class="shop-page-area ptb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <ul class="view-mode">
                                    <li><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                    <li class="active"><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
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
                            <div class="product-list product-view pb-20">
                                <div class="row">
                                    <?php 
                                    if ($resultProducts) {
                                        $products =$resultProducts->fetch_all(MYSQLI_ASSOC);
                                        foreach ($products as $key => $product) {
                                           ?>
                                           <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.html">
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
															<a href="product-details.html"><?php echo $product['name_en'] ?></a>
														</h4>
													</div>
													<div class="cart-hover">
														<h4><a href="product-details.html">+ Add to cart</a></h4>
													</div>
												</div>
												<div class="product-price-wrapper">
													<span><?php echo $product['price'] ?></span>
													<span class="product-price-old">$120.00 </span>
												</div>
											</div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="product-details.html"><?php echo $product['name_en'] ?></a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo $product['price'] ?></span>
                                                    <span class="product-price-old">$120.00 </span>
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
                                        if ($resultCategories) {
                                            $categories= $resultCategories->fetch_all(MYSQLI_ASSOC);
                                            foreach ($categories as $key => $category) {
                                                ?>
                                                <li> <a href="#"><?php echo $category['name_en'] ?></a> </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                       
                                       
                                        
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">By Brand</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <?php 
                                        if ($resultBrands) {
                                            $brands= $resultBrands->fetch_all(MYSQLI_ASSOC);
                                            foreach ($brands as $key => $brand) {
                                                ?>
                                                <li><input type="checkbox"><a href="#"><?php echo $brand['name_en'] ?></a>
                                                <?php
                                            }
                                            
                                        }
                                        ?>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">By Color</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <?php 
                                        if ($resultSubCategories) {
                                            $subcategories= $resultSubCategories->fetch_all(MYSQLI_ASSOC);
                                            foreach ($subcategories as $key => $subcategory) {
                                                ?>
                                                <li><input type="checkbox"><a href="#"><?php echo $subcategory['name_en'] ?></a></li>
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
		<?php 
        include_once "layouts/footer.php";
        
        ?>