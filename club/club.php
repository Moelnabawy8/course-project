<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define("STAR_SUB", 10000);
    define("COST_OF_EACH", 2500);
    
    // الحصول على البيانات من الفورم
    $name = $_POST['name'] ;
    $count = $_POST['count'];
    
    // حساب التكلفة الإجمالية
    $cost_of_members = $count * COST_OF_EACH;
    $total = STAR_SUB + $cost_of_members;
    
    // تخزين القيم في الجلسة
    $_SESSION['name'] = $name;
    $_SESSION['count'] = $count;
    $_SESSION['total'] = $total;

   

   // إعادة التوجيه إلى صفحة أخرى بعد الحساب
     header('Location: family.php');
     exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIO CLUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .btn-subscribe {
            background-color: #198754;
            color: white;
            width: 100%;
        }
        form {
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="mb-4">RIO CLUB</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Member Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name">
            </div>
            <p class="fw-bold">Club subscription starts with <span class="text-primary">10,000 LE</span></p>
            <div class="mb-3">
                <label class="form-label">Count of family members</label>
                <input type="number" class="form-control" placeholder="Enter number" name="count">
            </div>
            <p class="fw-bold">Cost of each member is <span class="text-primary">2,500 LE</span></p>
            <button type="submit" class="btn btn-subscribe">Subscribe</button>
        </form>
    </div>
</body>
</html>