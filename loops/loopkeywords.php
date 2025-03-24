<?php 
$users=['mo','jo','foo','hoba','kkk','jkj' ];



foreach ($users as $index => $value) {
    if ($index % 2!==0) {
        continue;
    }
    echo $value .'<br>';}
    ;





    $users=['mo','jo','foo','hoba','kkk','jkj' ];
foreach ($users as $index => $value) {
    if ($index % 2!==0) {
        break;
    }
    echo $value .'<br>';};