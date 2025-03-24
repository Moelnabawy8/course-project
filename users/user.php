<?php
if ($_POST) {
   switch ($_POST['user']) {
    case 'mo':
        $id=1;
        $name=$_POST['user'];
        $gender='male';
        $email='mo@gmail.com';        
        $phone='01016233627';
        break;
        case 'mo':
            $id=2;
            $name=$_POST['user'];
            $gender='male';
            $email='akram@gmail.com';
            $phone='01030109241';
            break;
            case 'jo':
                $id=3;
                $name=$_POST['user'];
                $gender='male';
                $email='jo@gmail.com';
                $phone='01026736208';
                break;
    default:
    case 'hoba':
        $id=4;
        $name=$_POST['user'];
        $gender='male';
        $email='hoba@gmail.com';
        $phone='01550301652';
        break;
   }
   $message = "<ul style='list-style-type: none; padding: 10px; background-color: #f0f8ff; border-radius: 5px;'>
   <li style='margin-bottom: 5px; color: #333;'><strong>id:</strong> $id</li>
   <li style='margin-bottom: 5px; color: #333;'><strong>Name:</strong> $name</li>
   <li style='margin-bottom: 5px; color: #333;'><strong>email:</strong> $email</li>
   <li style='margin-bottom: 5px; color: #333;'><strong>phone:</strong> $phone</li>
   <li style='color: #333;'><strong>gender:</strong> $gender</li>
</ul>";
}


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

    <form  method="post">
        <h2>تسجيل بيانات المستخدم</h2>

        

        <label for="user">user:</label>
        <select id="user" name="user">
            <option value="mo">mo</option>
            <option value="jo">jo</option>
            <option value="hoba">hoba</option>
            <option value="akram">akram</option>
        </select>

        <button type="submit" name="action" value="submit_form" class="styled-button">إرسال النموذج</button>
    </form>
    <?php if(isset($message)){
                         echo $message;
                         } 
                         ?>

</body>
</html>