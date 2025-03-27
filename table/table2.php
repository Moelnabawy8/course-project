<?php
$columns = ['id', 'name', 'age', 'address', 'skills', 'projects'];

$employees = [
    (object)[
        'id' => 101,
        'name' => 'Omar',
        'age' => 29,
        'address' => (object)[
            'city' => 'Cairo',
            'country' => 'Egypt'
        ],
        'skills' => ['PHP', 'Laravel', 'JavaScript'],
        'projects' => [
            'E-commerce' => 'Laravel Project',
            'Portfolio' => 'React Website'
        ]
    ],
    (object)[
        'id' => 102,
        'name' => 'Sara',
        'age' => 25,
        'address' => (object)[
            'city' => 'Alexandria',
            'country' => 'Egypt'
        ],
        'skills' => ['Python', 'Django', 'Machine Learning'],
        'projects' => [
            'Chatbot' => 'AI Assistant',
            'Data Analysis' => 'Big Data Project'
        ]
    ]
];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <?php foreach ($columns as  $column) { ?>
                <th><?= $column ?></th>
            <?php } ?>
        </thead>
        <tbody>
            <?php
            foreach ($employees as $index => $employee) { ?>
                <tr>
                    <?php
                    foreach ($employee as $property => $value) {?>
                        <td>
                            <?php
                        if (gettype($value) == "array" or gettype($value) == "object") {
                            foreach ($value as $k => $v) {
                                echo $v . " ";
                            }
                        } else {
                            echo $value;
                        }?>
                        </td>
                   <?php }

                    ?>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>