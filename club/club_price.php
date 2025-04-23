<?php 
session_start();

// التأكد من وجود بيانات الأعضاء في الجلسة
if (!isset($_SESSION['members']) || empty($_SESSION['members'])) {
    echo "<h2 class='text-center text-danger'>No members found! Please go back and enter details.</h2>";
    echo '<div class="text-center"><a href="index.php" class="btn btn-primary">Go Back</a></div>';
    exit();
}

// مصفوفة أسعار الهوايات
$hobbies_price = [
    "football" => 300, 
    "swimming" => 250, 
    "volleyball" => 150, 
    "others" => 100
];

$total_cost = 0; // متغير لتخزين التكلفة الإجمالية لكل الأعضاء
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Subscription Price</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 700px;
            margin-top: 50px;
        }
        .member-section {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .total-cost {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Subscription Summary</h2>
        
        <?php foreach ($_SESSION['members'] as $member) : ?>
            <div class="member-section">
                <h5>Name: <?= htmlspecialchars($member["name"]) ?></h5>
                <p>Hobbies:</p>
                <ul>
                    <?php 
                    $member_cost = 0; // تكلفة كل عضو
                    if (!empty($member["hobbies"])) {
                        foreach ($member["hobbies"] as $hobby) {
                            echo "<li>" . ucfirst($hobby) . " - " . $hobbies_price[$hobby] . " LE</li>";
                            $member_cost += $hobbies_price[$hobby];
                        }
                    } else {
                        echo "<li>No hobbies selected</li>";
                    }
                    ?>
                </ul>
                <p><strong>Total for <?= htmlspecialchars($member["name"]) ?>:</strong> <?= $member_cost ?> LE</p>
            </div>
            <?php $total_cost += $member_cost; ?>
        <?php endforeach; ?>
        
        <div class="total-cost">Total Club Subscription: <?= $total_cost ?> LE</div>
        <div class="text-center mt-4">
            <a href="club.php" class="btn btn-primary">Back</a>
        </div>
    </div>
</body>
</html>
