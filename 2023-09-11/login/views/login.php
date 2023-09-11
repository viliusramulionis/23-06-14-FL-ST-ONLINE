<?php
    //email = 'admin@bit.lt';
    //password = '1234';

    if(isset($_POST['email']) AND isset($_POST['password'])) {

        if($_POST['email'] != 'admin@bit.lt' AND $_POST['password'] != '1234') {
            header('Location: ?page=');
            exit;
        }

        //Sesijos duomenų priskyrimas
        $_SESSION['loggedin'] = true;
        
        header('Location: ?page=admin');
        exit;
    }
?>
<main class="form-signin w-100 m-auto">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Prisijungimo puslapis</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">El. paštas</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Slaptažodis</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Prisijungti</button>
    </form>
</main>
<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>