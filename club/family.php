<?php 
session_start();

// التحقق من أن المستخدم قام بإدخال عدد الأعضاء
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['members'] = []; //عملنا مصفوفة فاضية هنخزن فيها
    $hobbies_price = ["football" => 300, "swimming" => 250, "volleyball" => 150, "others" => 100];

    for ($i = 0; $i < $_SESSION['count']; $i++) {
        $name = $_POST["member_name"][$i] ?? "Member " . ($i + 1);
        $hobbies = $_POST["hobbies"][$i] ?? [];

        $_SESSION['members'][] = [
            "name" => $name,
            "hobbies" => $hobbies
        ];
    }

    header("Location: club_price.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Subscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .member-section {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .btn-check-price {
            width: 100%;
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Family Subscription</h2>
        <form method="POST" action="">
            <?php 
            for ($i = 0; $i < $_SESSION['count']; $i++) { 
                echo '<div class="member-section">
                        <h5>Member ' . ($i + 1) . '</h5>
                        <input type="text" name="member_name[]" class="form-control mb-2" placeholder="Enter Member Name">
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies['.$i.'][]" value="football">
                            <label class="form-check-label">Football (300LE)</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies['.$i.'][]" value="swimming">
                            <label class="form-check-label">Swimming (250LE)</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies['.$i.'][]" value="volleyball">
                            <label class="form-check-label">Volleyball (150LE)</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobbies['.$i.'][]" value="others">
                            <label class="form-check-label">Others (100LE)</label>
                        </div>
                    </div>';
            }
            ?>
            <button type="submit" class="btn btn-check-price">Check Price</button>
        </form>
    </div>
</body>
</html>
