<?php
if (!isset($_SESSION['loggedin']) and !$_SESSION['loggedin']) {
    header('Location: ?page=login');
    exit;
}

$data = getData();
$message = isset($_GET['message']) ? $_GET['message'] : false;
$status = isset($_GET['status']) ? $_GET['status'] : false;

if(isset($_GET['action']) AND $_GET['action'] === 'delete') {
    foreach($data as $key => $account) {
        if($account['id'] === intval($_GET['id'])) {
            if($account['ammount'] > 0) {
                $message = 'Sąskaitos ištrinti nepavyko, nes joje yra lėšų.';
                $status = 'danger';
            } else {
                unset($data[$key]);

                if(saveData($data)) 
                    header('Location: ?message=Sąskaita sėkmingai ištrinta&status=success');
                else 
                    header('Location: ?message=Įvyko klaida bandant ištrinti sąskaitą&status=danger');
            }

            break;
        }
    }
}
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Jūsų banko sąskaitos</h1>
    <a href="?page=newaccount" class="btn btn-primary">Nauja sąskaita</a>
</div>
<?php if ($message) : ?>
    <div class="alert alert-<?= $status ?>"><?= $message ?></div>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>A.K.</th>
            <th>Sąskaitos numeris</th>
            <th>Likutis</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $account) : ?>
            <tr>
                <td><?= $account['id'] ?></td>
                <td><?= $account['name'] ?></td>
                <td><?= $account['last_name'] ?></td>
                <td><?= $account['ak'] ?></td>
                <td><?= $account['iban'] ?></td>
                <td><?= $account['ammount'] ?> €</td>
                <td>
                    <a href="?action=delete&id=<?= $account['id'] ?>" class="btn btn-danger">Trinti</a>
                    <a href="?page=addfunds&id=<?= $account['id'] ?>" class="btn btn-success">Pridėti lėšų</a>
                    <a href="?page=deductfunds&id=<?= $account['id'] ?>" class="btn btn-warning">Nuskaičiuoti lėšas</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>