<?php
    $data = getData();

    $acount = array_filter($data, fn($account) => $account['id'] === (int) $_GET['id']);

    $acount = array_values($acount)[0];

    if(isset($_POST['ammount'])) {
        // $acount['ammount'] += $_POST['ammount'];
            
        $data = array_map(function($value) {
            if($value['id'] === (int) $_GET['id'])
                $value['ammount'] += $_POST['ammount'];

            return $value;
        }, $data);

        if(saveData($data)) 
            header('Location: ?message=Lėšos sėkmingai papildytos&status=success');
        else 
            header('Location: ?message=Nepavyko įrašyti duomenų&status=danger');

    }
?>
<h1>Lėšų pridėjimas</h1>

<ul>
    <li>Kliento vardas: <?= $acount['name'] ?></li>
    <li>Kliento pavardė: <?= $acount['last_name'] ?></li>
    <li>Sąskaitos likutis: <?= $acount['ammount'] ?> €</li>
</ul>

<form method="POST" class="input-group">
    <input type="number" class="form-control" min="0" value="0" name="ammount">
    <button class="btn btn-primary">Pridėti</button>
</form>