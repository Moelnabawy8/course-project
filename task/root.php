<?php
if ($_POST) {
    $message= sqrt($_POST['num1']);
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
            <label for="num1">الرقم :</label>
            <input type="text" id="num1" name="num1"><br><br>
            <button type="submit" id="submitBtn">إرسال</button>
        </form>
        <p id="result"><?php if (isset($message)) {
           echo $message;
        }  ?></p>
    </div>
    
</body>
</html>