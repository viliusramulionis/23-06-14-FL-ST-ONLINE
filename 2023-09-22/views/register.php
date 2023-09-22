<?php
    $message = false;

    if(
        isset($_POST['email']) AND 
        isset($_POST['password']) AND
        strlen($_POST['email']) > 3 AND
        strlen($_POST['password']) > 3 
    ) {
        $result = $db->query(
            sprintf("INSERT INTO users (email, password) VALUES ('%s', '%s')", $_POST['email'], md5($_POST['password']))
        );

        if($result) {
            header('Location: ?');
            exit;
        } else {
            $message = 'This email is already registered';
        }
    } else {
        $message = 'Neįvestas vartotojo vardas arba slaptažodis';
    }
?>
<?php if($message) : ?>
    <div class="alert alert-danger">
        <?= $message ?>
    </div>
<?php endif; ?>
<main class="form-signin w-100 m-auto">
  <form method="POST">
    <h1 class="h3 mb-3 fw-normal">Registration</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
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