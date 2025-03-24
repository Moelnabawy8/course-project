<?php
$message = "";
if ($_POST) {
    if (isset($_POST['ara']) && isset($_POST['bio']) && isset($_POST['math']) && isset($_POST['geo']) && isset($_POST['eng'])) {
        $ara = $_POST['ara'];
        $bio = $_POST['bio'];
        $math = $_POST['math'];
        $geo = $_POST['geo'];
        $eng = $_POST['eng'];
        $total = (($ara + $bio + $eng + $geo + $math) / 500) * 100;

        if ($total >= 90 && $total <= 100) {
            $message = "grade A";
        } elseif ($total >= 80 && $total < 90) {
            $message = "grade B";
        } elseif ($total >= 70 && $total < 80) {
            $message = "grade C";
        } elseif ($total >= 60 && $total < 70) {
            $message = "grade D";
        } elseif ($total >= 40 && $total < 60) {
            $message = "grade E";
        } else {
            $message = "fail";
        }
    } else {
        $message = "يجب إدخال جميع الدرجات";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>إدخال الأرقام</title>
    <style>
        .container {
            width: 300px;
            margin: 100px auto;
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <label for="bio">bio :</label>
            <input type="number" id="bio" name="bio"><br><br>
            <label for="math">math :</label>
            <input type="number" id="math" name="math"><br><br>
            <label for="eng">eng :</label>
            <input type="number" id="eng" name="eng"><br><br>
            <label for="geo">geo :</label>
            <input type="number" id="geo" name="geo"><br><br>
            <label for="ara">ara :</label>
            <input type="number" id="ara" name="ara"><br><br>
            <button type="submit" id="submitBtn">إرسال</button>
        </form>
        <p id="result"><?php if (isset($message)) {
            echo $message;
        } ?></p>
    </div>
</body>
</html>