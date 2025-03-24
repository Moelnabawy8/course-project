<?php 
$users=['mo','jo','foo','hoba','kkk','jkj' ];



foreach ($users as $index => $value)
    
    
    echo $value .'<br>';


$product=[
    'id'=>1,
    "status"=>"true",
    "name"=>"mo",
    "email"=> "moelnabawy@gmail.com"

 ];
            foreach ($product as $key => $value) {
                echo $value .'<br>'. $key;
            }
?>