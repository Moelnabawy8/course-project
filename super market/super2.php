<?php 
session_start();
$total_price = 0;
$num_products = 0;
$discount = 0;
$delivery = 0;
$totalafterdiscount = 0;
$nettotal = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // حساب تكلفة التوصيل بناءً على المدينة
    switch ($_POST['city']) {
        case 'cairo': $delivery = 0; break;
        case 'giza': $delivery = 30; break;
        case 'mansoura': $delivery = 100; break;
        default: $delivery = 100; break;
    }

    // تحويل عدد المنتجات لقيمة صحيحة
    $num_products = (int) $_POST['num_products'];

    // التأكد من أن الأسعار موجودة
    if (isset($_POST['price'])) {
        foreach ($_POST['price'] as $price) {
            $total_price += (float) $price; // جمع الأسعار
        }

        // حساب الخصم
        if ($total_price <= 1000) {
            $discount = 0;
        } elseif ($total_price <= 3000) {
            $discount = $total_price * 0.1;
        } elseif ($total_price < 4500) {
            $discount = $total_price * 0.15;
        } else {
            $discount = $total_price * 0.2;
        }

        // حساب السعر بعد الخصم وإجمالي الفاتورة
        $totalafterdiscount = $total_price - $discount;
        $nettotal = $totalafterdiscount + $delivery;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket Checkout</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .card { max-width: 600px; margin: auto; background-color: white; border-radius: 10px; padding: 20px; }
        h2 { color: #007bff; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <h2 class="text-center mb-4">Supermarket Checkout</h2>

        <!-- Form to Get Number of Products -->
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input name="username" type="text" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">City:</label>
                <select name="city" class="form-select" required>
                    <option value="" disabled selected>-- Select a City --</option>
                    <option value="cairo">Cairo</option>
                    <option value="giza">Giza</option>
                    <option value="mansoura">Mansoura</option>
                    <option value="other">Others</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Number of Products:</label>
                <input type="number" name="num_products" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Next</button>
        </form>

        <!-- توليد حقول المنتجات بعد إدخال العدد -->
        <?php if ($num_products > 0) {?>
            <form method="post">
            <input type="hidden" name="username" value="<?= $_POST['username'] ?>">
            <input type="hidden" name="city" value="<?= $_POST['city'] ?>">
            <input type="hidden" name="num_products" value="<?= $num_products ?>">

            <h4 class="mt-4">Enter Products</h4>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $num_products; $i++): ?>
                        <tr>
                            <td><input type="text" name="product_name[]" class="form-control" required></td>
                            <td><input type="number" name="price[]" class="form-control" min="0" required></td>
                            <td><input type="number" name="quantity[]" class="form-control" min="1" required></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>  
            <button type="submit" class="btn btn-success w-100">Calculate</button>
        </form>
       <?php } ?>
        
        

        <!-- عرض النتيجة بعد الحساب -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['price'])) {?>
            <div class="result-box mt-4 p-3 border border-success rounded">
            <h4 class="text-center text-success">Invoice</h4>
            <p><strong>User Name:</strong> <?= $_POST['username'] ?></p>
            <p><strong>City:</strong> <?= $_POST['city'] ?></p>
            <p><strong>Total Price:</strong> <?= number_format($total_price, 2) ?> EGP</p>
            <p><strong>Discount:</strong> <?= number_format($discount, 2) ?> EGP</p>
            <p><strong>Total After Discount:</strong> <?= number_format($totalafterdiscount, 2) ?> EGP</p>
            <p><strong>Delivery Cost:</strong> <?= number_format($delivery, 2) ?> EGP</p>
            <p><strong>Net Total:</strong> <?= number_format($nettotal, 2) ?> EGP</p>
        </div>
      <?php  }?>
        
        
    </div>
</div>

</body>
</html>
