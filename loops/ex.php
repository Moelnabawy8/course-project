<?php 
// $students = ["أحمد", "منى", "خالد", "سارة"];
// foreach ($students as  $name) {
// echo $name . "<br>";
// }



// $students = [
//     [
//         "name" => "أحمد",
//         "grades" => [
//             "رياضيات" => 85,
//             "علوم" => 92,
//             "لغة عربية" => 78
//         ]
//     ],

//     [
//         "name" => "منى",
//         "grades" => [
//             "رياضيات" => 95,
//             "علوم" => 88,
//             "لغة عربية" => 90
//         ]
//     ],

//     [
//         "name" => "خالد",
//         "grades" => [
//             "رياضيات" => 70,
//             "علوم" => 75,
//             "لغة عربية" => 80
//         ]
//     ]
    
// ];

// foreach ($students as $index => $student) {
//     echo $student['name'] . ":" ;
//     foreach ($student['grades'] as $subject => $grade) {
//       echo $subject . ":" . $grade;
//     }
//     echo "<br>";
// }


// $employees = [
//     [
//         "name" => "أحمد",
//         "department" => "المبيعات",
//         "salary" => [
//             "أساسي" => 5000,
//             "بدلات" => 1000,
//             "خصومات" => 200
//         ]
//     ],

//     [
//         "name" => "منى",
//         "department" => "التسويق",
//         "salary" => [
//             "أساسي" => 6000,
//             "بدلات" => 1200,
//             "خصومات" => 100
//         ]
//     ],

//     [
//         "name" => "خالد",
//         "department" => "الدعم الفني",
//         "salary" => [
//             "أساسي" => 4500,
//             "بدلات" => 800,
//             "خصومات" => 50
//         ]
//     ]
// ];

// foreach ($employees as $index => $employee) {
//     echo $employee['name']."<br>";
//     foreach ($employee as $department => $salary) {
//         echo $employee['department']. ":" . $employee['salary'];
//     }
//     echo"<br>";
// }


// $students = [
//     ["name" => "أحمد", "grades" => [80, 90, 85]],
//     ["name" => "منى", "grades" => [75, 85, 95]]
// ];
// foreach ($students as $student) { // تم تغيير $name إلى $student لتوضيح الهدف
//     echo "name is " . $student["name"] . "<br>";
//     foreach ($student['grades'] as $grade) {
//         echo $grade . " "; // تم إضافة مسافة للفصل بين الدرجات
//     }
//     echo "<br>"; // تم إضافة سطر جديد بعد عرض الدرجات
// }




// $teams = [
//     [
//         "name" => "الأهلي",
//         "players_count" => 30,
//         "main_players" => ["محمد الشناوي", "أيمن أشرف", "أليو ديانج"]
//     ],
//     [
//         "name" => "الزمالك",
//         "players_count" => 28,
//         "main_players" => ["محمد عواد", "محمود الونش", "أحمد سيد زيزو"]
//     ],
//     [
//         "name" => "بيراميدز",
//         "players_count" => 25,
//         "main_players" => ["أحمد الشناوي", "علي جبر", "عبد الله السعيد"]
//     ]
// ];
// foreach ($teams as  $team) {
//     echo $team['name']."<br>" . $team['players_count'] . "<br>";
//     foreach ($team['main_players'] as $mainplayer) {
//         echo$mainplayer ;
//     }
// }
// $products = [
//     ["name" => "قلم", "price" => 10, "quantity" => 100],
//     ["name" => "كتاب", "price" => 20, "quantity" => 50]
// ];
// foreach ($products as  $product) {
//     echo $product['name'] . " " . $product['price'] . " " . $product['quantity'] . "<br>";
// }
// $students = [
//     ["name" => "أحمد", "grades" => ["رياضيات" => 80, "علوم" => 90]],
//     ["name" => "منى", "grades" => ["رياضيات" => 75, "علوم" => 85]]
// ];
// foreach ($students as  $student) {
//     echo $student['name'];
//     foreach ($student['grades'] as $subject=>$grade) {
//        echo $subject . "<br>" . $grade;
//     }
// }

// $orders = [
//     ["id" => 1, "products" => ["قلم", "كتاب"]],
//     ["id" => 2, "products" => ["كتاب", "قلم", "مسطرة"]]
// ];
// foreach ($orders as  $order) {
//     echo $order['id'] . "<br>";
//     foreach ($order['products'] as  $product) {
//         echo $product;
//     }
// }
// $numbers = [1, 2, 3, 4, 5];

// foreach ($numbers as &$number) {
//     $number *= 2; // مضاعفة كل عنصر
// }
// print_r($numbers);

$users = [
    [
        'id'=>5,
        'name'=>'aya',
        'activities'=>[
            'reading','swimming'
        ]
    ],
    [
        'id'=>1,
        'name'=>'sara',
        'activities'=>[
            'football','gym','sss'
        ]
    ]
];
foreach ($users as  $user) {
    echo $user['id'] . " " . $user['name'] ;
    foreach ($user['activities'] as  $activity) {
        echo $activity ;
    }
}
?>