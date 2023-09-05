<?php
    if(isset($_POST['filename'])) {
        //https://www.php.net/manual/en/function.rename.php
        rename('failas.txt', $_POST['filename']);
        header('Location: openForm.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma</title>
</head>
<body>
    <a href="?action=edit">Paspausk mane</a>
    <?php if(isset($_GET['action']) AND $_GET['action'] === 'edit') : ?>
        <form method="POST">
            <input type="text" name="filename" placeholder="Įveskite failo pavadinimą">
            <button class="btn btn-primary">Keisti</button>
        </form>
    <?php endif; ?>
</body>
</html>