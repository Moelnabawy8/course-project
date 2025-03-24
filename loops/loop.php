<?php 
$users=['sara','asmaa','moo','joo','foo'];
$message= 'hello from anfield';
//for loop ++
for ($i=1; $i <=5 ; $i++) { 
    echo $message .$i . "<br>";
}
echo "<br>";
//for loop --
for ($i=5; $i>0 ; $i--) { 
    echo $message .$i . "<br>";
}
echo "<br>";
//for loop with last index ++
$lastindex=count($users)-1;
for ($i=0; $i<=$lastindex ; $i++) { 
    echo $users[$i]. "<br>";
}
echo "<br>";

//for loop with last index --
for ($i=$lastindex; $i>=0 ; $i--) { 
    echo $users[$i]. "<br>";
}
echo "<br>";

//while looop
$i=0;
while ($i <= 5) {
    echo $message . "<br>";
    $i++;
}
echo "<br>";


//do while loop
$i=0;
do {
  echo $message . "<br>" ;$i++;} while ($i <= 5);


?>  