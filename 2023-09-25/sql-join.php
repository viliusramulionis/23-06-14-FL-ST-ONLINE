<?php

try {
    $db = new mysqli('localhost', 'root', '', 'todo');
} catch (Exception $klaida) {
    echo 'Nepavyko prisijungti';
    exit;
}

$result = $db->query("SELECT tasks.id, tasks.name, tasks.status, users.email, users.password, users.stats FROM tasks JOIN users ON tasks.user_id = users.id;");

echo '<pre>';

foreach($result->fetch_all(MYSQLI_ASSOC) as $task) {
    //$user = $db->query("SELECT * FROM users WHERE id = " . $task['user_id']);
    print_r($task);
    //print_r($user->fetch_all());
}
