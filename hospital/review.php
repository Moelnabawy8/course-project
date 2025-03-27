<?php
session_start();


if (!isset($_SESSION['review_data']) || empty($_SESSION['review_data'])) {
    echo "<h2>No survey data available.</h2>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f9ff;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .review-list {
            list-style: none;
            padding: 0;
            text-align: left;
        }
        .review-list li {
            font-size: 18px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .score {
            font-size: 22px;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
        }
        .phone-box {
            background: #e3f2fd;
            color: #007bff;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 8px;
            margin-top: 20px;
            display: inline-block;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Survey Review</h2>
        <ul class="review-list">
            <li><strong>Cleanliness:</strong> <?php echo $_SESSION['review_data']['cleanliness']; ?></li>
            <li><strong>Staff Satisfaction:</strong> <?php echo $_SESSION['review_data']['staff']; ?></li>
            <li><strong>Waiting Time:</strong> <?php echo $_SESSION['review_data']['waiting_time']; ?></li>
            <li><strong>Overall Experience:</strong> <?php echo $_SESSION['review_data']['experience']; ?></li>
            <li><strong>Recommendation:</strong> <?php echo $_SESSION['review_data']['recommend']; ?></li>
        </ul>
        <div class="score">Total Score: <?php echo $_SESSION['total_score']; ?> / 50 Bad</div> <br>
        <div class="phone-box">
            📞 Please contact the patient: <?php echo $_SESSION['phone']; ?>
        </div>        <a href="hospital.php" class="btn">Back to Survey</a>
    </div>
</body>
</html>
