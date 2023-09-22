<?php
    if(!isset($_SESSION['user_id'])) {
        header('Location: ?page=login');
        exit;
    }

    if(isset($_POST['name']) AND strlen($_POST['name']) > 3) {
        $db->query(
            sprintf("INSERT INTO tasks (name, user_id) VALUES ('%s', '%d')", $_POST['name'], $_SESSION['user_id'])
        );
        header('Location: ?');
        exit;
    }

    //Įrašo atnaujinimas
    if(isset($_GET['action']) AND $_GET['action'] === 'mark') {
        $db->query("UPDATE tasks SET status = !status WHERE id = " . $_GET['id']);
    }

    //Įrašo trynimas
    if(isset($_GET['action']) AND $_GET['action'] === 'delete') {
        $db->query("DELETE FROM tasks WHERE id = " . $_GET['id']);
    }

    // $result = $db->query("SELECT stats FROM users WHERE id = ". $_SESSION['user_id']);

    // $user = $result->fetch_assoc();

    // $db->query("UPDATE users SET stats = " . $user['stats'] + 1 . " WHERE id = " . $_SESSION['user_id']);
    
    //Peržiūrų skaičiaus registracija
    $db->query("UPDATE users SET stats = stats + 1 WHERE id = " . $_SESSION['user_id']);

    $data = false;

    if ($result = $db->query("SELECT * FROM tasks WHERE user_id = " . $_SESSION['user_id'])) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }
?>
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