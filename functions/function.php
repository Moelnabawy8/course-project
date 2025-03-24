<?php 
function sayhello(){
    echo "hello" . "<br>" ;
}

sayhello();

function add($num1, $num2){
    $num=$num1+$num2;
return $num;
}

 echo add(5,10);


 function addv2($num1,$num2){
$num=$num1+$num2;

 } 
 echo addv2(10,18);



 function addv3(){
    $num1=5;
    $num2=15;
    return $num1+$num2;
 }
 echo addv3();

 function addv4(){
    $num1=5;
    $num2=17;
    echo $num1+$num2;
 }
 addv4();
?>