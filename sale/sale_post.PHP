
<?php
define('VAT',0.14);
switch ($_POST['city']) {
    case 'cairo':
        $delivery = 0;
        break;
    case 'alex':
        $delivery = 50;
        break;
    default:
        $delivery = 200;
}

switch ($_POST['product']) {
    case 'laptop':
        $price = 15000;
        $discount = 0.2;
        break;
    case 'mobile':
        $price = 12000;
        $discount = 0.1;
        break;
    case 'tv':
        $price = 10000;
        $discount = 0.05;
        break;
    default:
        $price = 250;
        $discount = 0;
}
$vat = $price * VAT;
$priceAfterVat = $price + $vat;
$discountValue = $priceAfterVat * $discount;
$priceAfterDiscount = $priceAfterVat - $discountValue;
$totalPrice = $priceAfterDiscount + $delivery;
?>
?>

<!DOCTYPE html>
<html>
<head>
    <title>فاتورة</title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff; /* لون أزرق جذاب */
            margin-bottom: 20px;
        }

        #invoice {
            border: 1px solid #e0e0e0;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        #invoice p {
            margin-bottom: 10px;
            color: #333;
            line-height: 1.6;
        }

        #invoice strong {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="invoice">
            <h2>فاتورة</h2>
            <p><strong>الاسم:</strong> <?php echo $_POST['name']; ?></p>
            <p><strong>رقم الهاتف:</strong> <?php echo $_POST['phone']; ?></p>
            <p><strong>المدينة:</strong> <?php echo$_POST['city']; ?></p>
            <p><strong>التوصيل:</strong><?php echo $delivery; ?></p>
            <p><strong>المنتج:</strong> <?php echo$_POST['product']; ?></p>
            <p><strong>السعر:</strong><?php echo$price ?> </p>
            <p><strong>السعر بعد الضريبة:</strong><?php echo $priceAfterVat  ?></p>
            <p><strong>الخصم:</strong><?php echo $discount*100 ?> </p>
            <p><strong>قيمة الخصم:</strong><?php echo $discountValue  ?> </p>
            <p><strong>السعر بعد الخصم:</strong><?php echo $priceAfterDiscount  ?> </p>
            <p><strong>اجمالي السعر:</strong><?php echo $totalPrice  ?> </p>
        </div>
    </div>
</body>
</html>