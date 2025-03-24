<?php

$users = [
    [
        'id'=>1,
        'name'=>'aya',
        'activities'=>(object)[
            'first'=>'gym',
            'second'=>'football'
        ]
    ]
    ,
    [
        'id'=>2,
        'name'=>'sara',
        'activities'=>[
            'reading','runing'
        ]
    ]
];
echo $users[0]['activities']->second;