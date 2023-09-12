<?php
if (!isset($_SESSION['loggedin']) and !$_SESSION['loggedin']) {
    header('Location: ?page=login');
    exit;
}

$data = getData();
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Jūsų banko sąskaitos</h1>
    <a href="?page=newaccount" class="btn btn-primary">Nauja sąskaita</a>
</div>
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
        <?php foreach ($data['accounts'] as $account) : ?>
            <tr>
                <td><?= $account['id'] ?></td>
                <td><?= $account['name'] ?></td>
                <td><?= $account['last_name'] ?></td>
                <td><?= $account['ak'] ?></td>
                <td><?= $account['iban'] ?></td>
                <td><?= $account['ammount'] ?></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>