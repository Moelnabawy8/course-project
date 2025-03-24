<?php 
$x=5;
function printnum($x){
    global $x;
     $x++ ;
     echo $x ;

}

printnum($x);


function sayhello(){
    echo "hello";
}
sayhello();


?>