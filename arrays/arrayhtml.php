<?php 
// $users=['mo','akram','hofa','hoba'];
// $users[4]='mama'; //add
// $users[2]='baba'; ///edit
// echo $users[2];  //get
// echo "<br>";
// // print_r($users);
// echo $number=count($users);
// echo "<br>";
//  Echo $lastindex=$number-1;


 $product=[
    'id'=>1,
    "status"=>"true",
    "name"=>"mo",
    "email"=> "moelnabawy@gmail.com"

 ];
 $product ;
 $product['id']=5;
 print_r($product);


 $productobject=(object)[
    'id'=>1,
    "status"=>"true",
    "name"=>"mo",
    "email"=> "moelnabawy@gmail.com"

 ];
//  echo $productobject->status;
$productobject->name='jo';
$productobject->age=15;
 print_r($productobject)

?>