<?php
$message=""; 
if ($_POST) {
    if ($_POST['num1'] > $_POST['num2'] && $_POST['num1'] > $_POST['num3']) {
        $message = "num1 هو أكبر رقم";
    } elseif ($_POST['num2'] > $_POST['num1'] && $_POST['num2'] > $_POST['num3']) {
        $message = "num2 هو أكبر رقم";
    } elseif ($_POST['num3'] > $_POST['num1'] && $_POST['num3'] > $_POST['num2']) {
        $message = "num3 هو أكبر رقم";
    } else {
        $message = "يوجد رقمين او ثلاث ارقام متساوية";
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
            <label for="num1">الرقم الأول:</label>
            <input type="number" id="num1" name="num1"><br><br>
            <label for="num2">الرقم الثاني:</label>
            <input type="number" id="num2" name="num2"><br><br>
            <label for="num3">الرقم الثالث:</label>
            <input type="number" id="num3" name="num3"><br><br>
            <button type="submit" id="submitBtn">إرسال</button>
        </form>
        <p id="result"><?php echo $message ?></p>
    </div>
    <script>
        function validateForm() {
            let num1 = document.getElementById('num1').value;
            let num2 = document.getElementById('num2').value;
            let num3 = document.getElementById('num3').value;

            if (num1 === "" || num2 === "" || num3 === "") {
                alert("يرجى إدخال جميع الأرقام");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>