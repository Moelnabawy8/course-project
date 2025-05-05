<?php
$title = "Wishlist";
include 'layouts/header.php';
include 'layouts/nav.php';
include 'layouts/breadcrumb.php';
include_once "app/models/Product.php";
$product = new Product();
$product->setStatus(1);
$resultProducts = $product->read();
?>
<!-- shopping-cart-area start -->
<div class="cart-main-area ptb-100">
    <div class="container">
        <h3 class="page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive wishlist">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Add To Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultProducts) {
                                    $products = $resultProducts->fetch_all(MYSQLI_ASSOC);
                                    foreach ($products as $key => $product) { ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="assets/img/product/<?php echo $product['image'] ?>" alt=""
                                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#"><?php echo $product['name_en'] ?></a>
                                            </td>
                                            <td class="product-price-cart">
                                                <span class="amount"><?php echo $product['price'] ?></span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input class="cart-plus-minus-box" type="text" value="<?php echo $product['quantity'] ?>" name="qtybutton">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <?php echo $product['price'] * $product['quantity']; ?>
                                            </td>

                                            <td class="product-wishlist-cart">
                                                <a href="#">add to cart</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'layouts/footer.php';
?>