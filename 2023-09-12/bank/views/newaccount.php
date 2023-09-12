<?php
    $fields = [
        'name' => 'Jūsų vardas', 
        'last_name' => 'Jūsų pavardė', 
        'ak' => 'Asmens kodas', 
        'iban' => 'Sąskaitos numeris'
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(validate($fields, $_POST)) {
            echo 'Validacija sėkminga';
        } else {
            echo 'Validacija nepavyko';
        }
    }
?>

<h1>Nauja sąskaita</h1>

<form method="POST">
    <?php foreach($fields as $name => $label) : ?>
        <div class="mb-3">
            <label><?= $label ?></label> 
            <input 
                type="text" 
                class="form-control" 
                name="<?= $name ?>" 
                <?= $name === 'iban' ? 'readonly value="LT54615616515661"' : '' ?>
                >
        </div>
    <?php endforeach; ?>
    <!-- <div class="mb-3">
        <label>Sąskaitos numeris</label> 
        <input type="text" class="form-control" name="iban" readonly value="LT54615616515661">
    </div> -->
    <button class="btn btn-primary">Kurti sąskaitą</button>
</form>