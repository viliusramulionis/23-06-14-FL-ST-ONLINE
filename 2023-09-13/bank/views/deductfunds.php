<?php
    $data = getData();

    $acount = array_filter($data, fn($account) => $account['id'] === (int) $_GET['id']);

    $acount = array_values($acount)[0];

    $message = false;
    
    if(isset($_POST['ammount'])) {
        if($_POST['ammount'] > $acount['ammount']) {
            $message = 'Nepakanka lėšų';
        } else {
            $data = array_map(function($value) {
                if($value['id'] === (int) $_GET['id'])
                    $value['ammount'] -= $_POST['ammount'];

                return $value;
            }, $data);

            if(saveData($data)) 
                header('Location: ?message=Lėšos sėkmingai nurašytos&status=success');
            else 
                header('Location: ?message=Nepavyko įrašyti duomenų&status=danger');
        }
    }
?>
<h1>Lėšų nurašymas</h1>
<?php if ($message) : ?>
    <div class="alert alert-danger"><?= $message ?></div>
<?php endif; ?>
<ul>
    <li>Kliento vardas: <?= $acount['name'] ?></li>
    <li>Kliento pavardė: <?= $acount['last_name'] ?></li>
    <li>Sąskaitos likutis: <?= $acount['ammount'] ?> €</li>
</ul>

<form method="POST" class="input-group">
    <input type="number" class="form-control" min="0" value="0" name="ammount">
    <button class="btn btn-primary">Nurašyti lėšas</button>
</form>