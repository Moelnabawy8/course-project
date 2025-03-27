<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score['Excellent'] =10;
    $score['Good'] =5;
    $score['Average'] =3;
    $score['Poor'] =0;
   

    if (isset($_POST['cleanliness'], $_POST['staff'], $_POST['waiting_time'], $_POST['experience'], $_POST['recommend'])) {
        $total_score = $score[$_POST['cleanliness']] +
            $score[$_POST['staff']] +
            $score[$_POST['waiting_time']] +
            $score[$_POST['experience']] +
            $score[$_POST['recommend']];

        $_SESSION['review_data'] = [
            'cleanliness' => $_POST['cleanliness'],
            'staff' => $_POST['staff'],
            'waiting_time' => $_POST['waiting_time'],
            'experience' => $_POST['experience'],
            'recommend' => $_POST['recommend']
        ];

        $_SESSION['total_score'] = $total_score;

        if ($total_score < 20) {
            header("location:review.php");
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Survey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f9ff;
        }

        .header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
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
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .question {
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .options {
            list-style: none;
            padding: 0;
        }

        .options li {
            margin: 10px 0;
        }

        .options input {
            margin-right: 10px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            margin-top: 15px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="header">Hospital Survey</div>
    <div class="container">
        <h2>Patient Satisfaction Survey</h2>
        <form action="" method="post">
            <div class="question">1. How would you rate the cleanliness of the hospital?</div>
            <ul class="options">
                <li><input type="radio" name="cleanliness" value="Excellent" required> Excellent</li>
                <li><input type="radio" name="cleanliness" value="Good"> Good</li>
                <li><input type="radio" name="cleanliness" value="Average"> Average</li>
                <li><input type="radio" name="cleanliness" value="Poor"> Poor</li>
            </ul>

            <div class="question">2. How satisfied are you with the hospital staff?</div>
            <ul class="options">
                <li><input type="radio" name="staff" value="Excellent" required> Excellent</li>
                <li><input type="radio" name="staff" value="Good"> Good</li>
                <li><input type="radio" name="staff" value="Average"> Average</li>
                <li><input type="radio" name="staff" value="Poor"> Poor</li>
            </ul>

            <div class="question">3. How would you rate the waiting time?</div>
            <ul class="options">
                <li><input type="radio" name="waiting_time" value="Excellent" required> Excellent</li>
                <li><input type="radio" name="waiting_time" value="Good"> Good</li>
                <li><input type="radio" name="waiting_time" value="Average"> Average</li>
                <li><input type="radio" name="waiting_time" value="Poor"> Poor</li>
            </ul>

            <div class="question">4. How was your overall experience at the hospital?</div>
            <ul class="options">
                <li><input type="radio" name="experience" value="Excellent" required> Excellent</li>
                <li><input type="radio" name="experience" value="Good"> Good</li>
                <li><input type="radio" name="experience" value="Average"> Average</li>
                <li><input type="radio" name="experience" value="Poor"> Poor</li>
            </ul>

            <div class="question">5. Would you recommend this hospital to others?</div>
            <ul class="options">
                <li><input type="radio" name="recommend" value="Excellent" required> Excellent</li>
                <li><input type="radio" name="recommend" value="Good"> Good</li>
                <li><input type="radio" name="recommend" value="Average"> Average</li>
                <li><input type="radio" name="recommend" value="Poor"> Poor</li>
            </ul>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>

</html>