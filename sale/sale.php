<?php



?>
<!DOCTYPE html>
<html>
<head>
    <title>نموذج تسجيل بيانات</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4; /* لون خلفية الصفحة */
        }

        form {
            width: 80%;
            max-width: 600px;
            text-align: left;
            background-color: white; /* لون خلفية النموذج */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* ظل للنموذج */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .styled-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .styled-button:hover {
            background-color: white;
            color: #4CAF50;
            border: 2px solid #4CAF50;
        }
    </style>
</head>
<body>

    <form action="sale_post.php" method="post">
        <h2>تسجيل بيانات المستخدم</h2>

        <label for="name">name:</label>
        <input type="text" id="name" name="name">

        <label for="phone">phone number :</label>
        <input type="tel" id="phone" name="phone">

        <label for="city">city:</label>
        <select id="city" name="city">
            <option value="cairo">cairo</option>
            <option value="alex">alex</option>
            <option value="others">others</option>
        </select>

        <label for="product">product:</label>
        <select id="product" name="product">
            <option value="laptop">laptop</option>
            <option value="mobile">mobile</option>
            <option value="tv">tv</option>
            <option value="tshirt">tshirt</option>
        </select>

        <button type="submit" name="action" value="submit_form" class="styled-button">إرسال النموذج</button>
    </form>

</body>
</html>