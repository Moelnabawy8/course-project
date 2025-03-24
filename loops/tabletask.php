<?php
function displayValue($value) {
    if (is_object($value)) {
        return json_encode($value); // عرض الكائن كـ JSON
    } elseif (is_array($value)) {
        return implode(", ", $value); // عرض المصفوفة كقائمة مفصولة بفواصل
    } else {
        return $value; // عرض القيمة كما هي
    }
} 
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running', 'painting'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ], 'soad' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]
    ],  (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running', 'painting'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ], 'soad' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ], 'soad' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]
    ],
    (object)[
        'id' => 3,
        'name' => 'mena',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ], 'soad' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]
    ],
    (object)[
        'id' => 3,
        'name' => 'mena',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ], 'soad' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]
    ],
    (object)[
        'id' => 3,
        'name' => 'mena',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing',
        ], 'soad' => [
            "school" => 'drawing',
            'home' => 'work'
        ]
    ]
];
?>
 
 <!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    font-family: sans-serif;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #e0f7fa;
}
</style>
</head>
<body>

<table>
    <thead>
        <tr>
        <?php
            $firstUser = $users[0];
            foreach ($firstUser as $key => $value) {
                echo "<th>" . htmlspecialchars($key) . "</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($users as $user) {
            echo "<tr>";
            foreach ($user as $value) {
                echo "<td>" . htmlspecialchars(displayValue($value)) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

