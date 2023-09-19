<?php

//https://www.php.net/manual/en/book.mysqli.php

//Prisijungimo inicijavimo eilutė
// new mysqli('HOST', 'USERNAME', 'PASSWORD', 'DATABASE');

//Prisijungimo tikrinimas try/catch blokų pagalba
try {
    $db = new mysqli('localhost', 'root', '', 'bank');
} catch(Exception $klaida) {
    echo 'Nepavyko prisijungti';
    exit;
}

$result = $db->query("SELECT * FROM accounts");

if($result->num_rows > 0) {
    // while($row = $result->fetch_assoc()) {
    //     print_r($row);
    // }
    $data = $result->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sąskaitos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <!-- <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Askmens kodas</th>
                <th>Sąskaitos numeris</th>
                <th>Likutis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['ak'] ?></td>
                    <td><?= $row['iban'] ?></td>
                    <td><?= $row['ammount'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table> -->

    <ul>
        <li><a href="?id=2">Virtual</a></li>
        <li><a href="?id=3">International</a></li>
    </ul>

    <h2>Sąskaitos kategorijoje Virtual</h2>

    <?php
        $id = $_GET['id'];
        $result = $db->query("SELECT * FROM accounts WHERE category_id = $id");
        $data = $result->fetch_all(MYSQLI_ASSOC);
    ?>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Askmens kodas</th>
                <th>Sąskaitos numeris</th>
                <th>Likutis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['ak'] ?></td>
                    <td><?= $row['iban'] ?></td>
                    <td><?= $row['ammount'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>
</html>
