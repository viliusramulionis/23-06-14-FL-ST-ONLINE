<?php

try {
    $db = new mysqli('localhost', 'root', '', 'todo');
} catch (Exception $klaida) {
    echo 'Nepavyko prisijungti';
    exit;
}

// $vardas = 'Vilius';
// $amzius = 18;

// echo sprintf('Mano vardas yra %s, mano amžius yra %d', $masyvas, $amzius);

//https://www.php.net/manual/en/function.sprintf.php
//Įrašo pridėjimas
if(isset($_POST['name']) AND strlen($_POST['name']) > 3) {
    $db->query(
        sprintf("INSERT INTO tasks (name) VALUES ('%s')", $_POST['name'])
    );
}

//Įrašo atnaujinimas
if(isset($_GET['action']) AND $_GET['action'] === 'mark') {
    $db->query("UPDATE tasks SET status = !status WHERE id = " . $_GET['id']);
}

//Įrašo trynimas
if(isset($_GET['action']) AND $_GET['action'] === 'delete') {
    $db->query("DELETE FROM tasks WHERE id = " . $_GET['id']);
}

$data = false;

if ($result = $db->query("SELECT * FROM tasks")) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
}

//Prisijungimo prie duomenų bazės uždarymas
$db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <form method="POST" class="my-3">
        <div class="input-group">
            <input type="text" name="name" class="form-control" placeholder="Enter task name">
            <button class="btn btn-primary">Add</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>created_at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $todo) : ?>
                <tr>
                    <td><?= $todo['id'] ?></td>
                    <td>
                        <a 
                            href="?action=mark&id=<?= $todo['id'] ?>"
                            <?= $todo['status'] ? 'style="text-decoration: line-through;"' : '' ?>
                        ><?= $todo['name'] ?></a>
                    </td>
                    <td><?= $todo['created_at'] ?></td>
                    <td>
                        <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>