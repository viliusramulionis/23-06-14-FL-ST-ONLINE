<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <?php
        //Route'ai:
        //Titulinis - client.php
        //Administratorius - admin.php
        //Prisijungimas - login.php
        $page = isset($_GET['page']) ? $_GET['page'] : false;

        switch($page) {
            case 'admin':
                include './views/admin.php';
                break;
            case 'login':
                include './views/login.php';
                break;
            case 'logout':
                //Vienos reikšmės panaikinimas
                // unset($_SESION['loggedin']);
                //Sesijos išvalymas
                session_destroy();
                header('Location: ?page=');
                break;
            default:
                include './views/client.php';
        }
    ?>
</body>
</html>