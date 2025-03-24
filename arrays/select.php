<?php
$genders = ['m' => 'male', 'f' => 'female'];
$select = "<select id='mySelect'>
    <option value='option1' class='option1'>{$genders['m']}</option>
    <option value='option2' class='option2'>{$genders['f']}</option>
</select>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>قائمة الاختيار الملونة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        select {
            padding: 12px 20px;
            font-size: 16px;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            background-color: #fff;
            color: #333;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        select:focus {
            outline: none;
            border-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .option1 {
            background-color: #e0f7fa;
        }

        .option2 {
            background-color: #e8f5e9;
        }
    </style>
</head>
<body>
    <div class="container">
        <label for="mySelect">اختر خيارًا:</label>
        <?php echo $select; ?>
        <p id="result" class="result"></p>
    </div>
    <script>
        let select = document.getElementById('mySelect');
        let result = document.getElementById('result');

        select.addEventListener('change', function() {
            let selectedValue = select.value;
            result.textContent = `القيمة المختارة: ${selectedValue}`;
            if (selectedValue === 'option1') {
                select.className = 'option1';
            } else if (selectedValue === 'option2') {
                select.className = 'option2';
            }
        });
    </script>
</body>
</html>