<?php
define('tax',.2);

$message="";
if ($_POST) {
    if ($_POST['num1']<50) {
       $price=$_POST['num1']*.5;
       $taxamount= tax *$_POST['num1']; 
       $message=$price+$taxamount;
    }elseif ($_POST['num1']<150 and $_POST['num1']>=50) {
        $price=$_POST['num1']*.75;  
        $taxamount= tax *$_POST['num1'];  
        $message=$price+$taxamount;
    }elseif ($_POST['num1']<250 and $_POST['num1']>=150) {
        $price=$_POST['num1']*1.20;  
        $taxamount= tax *$_POST['num1'];  
        $message=$price+$taxamount;
    }elseif ($_POST['num1']>=250 ) {
        $price=$_POST['num1']*1.50; 
        $taxamount= tax *$_POST['num1'];     
        $message=$price+$taxamount;
        
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