<?php

$fields = [
    'name' => 'Jūsų vardas',
    'last_name' => 'Jūsų pavardė',
    'ak' => 'Asmens kodas',
    'iban' => 'Sąskaitos numeris'
];

$message = false;
$iban = generateIBAN();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validate($fields, $_POST)) 
        $message = 'Laukeliai yra neužpildyti';
    else if (!validatePersonalNumber($_POST['ak']))
        $message = 'Neteisingas asmens kodas';
    else if (!checkIBAN($_POST['iban']))
        $message = 'Neteisingas sąskaitos numeris';
    else {
        //Informacijos išsaugojimas
        //Data paėmimas
        //Data iššifravimas
        //Data papildymas
        //Data iššsaugojimas

        $data = getData();
        $post = cleanData($fields, $_POST);

        //https://www.php.net/manual/en/function.end.php
        $post['id'] = ++end($data)['id'];
        $post['ammount'] = 0;

        $duplicates = array_filter($data, fn($account) => $account['ak'] === $post['ak']);
        
        $data[] = $post;
        
        if(!empty($duplicates)) {
            $message = 'Toks asmens kodas jau registruotas.';
        } else {
            if(saveData($data)) 
                header('Location: ?message=Sąskaita sėkmingai išssaugota&status=success');
            else 
                header('Location: ?message=Įvyko klaida įrašant duomenis&status=danger');
            
            exit;
        }
    }
}

?>

<h1>Nauja sąskaita</h1>
<?php if ($message) : ?>
    <div class="alert alert-danger"><?= $message ?></div>
<?php endif; ?>
<form method="POST">
    <?php foreach ($fields as $name => $label) : ?>
        <div class="mb-3">
            <label><?= $label ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="<?= $name ?>" 
                <?= $name === 'iban' ? "readonly value='$iban'" : '' ?>
                value="<?= isset($_POST[$name]) ? $_POST[$name] : '' ?>"
            >
        </div>
    <?php endforeach; ?>
    <!-- <div class="mb-3">
        <label>Sąskaitos numeris</label> 
        <input type="text" class="form-control" name="iban" readonly value="LT54615616515661">
    </div> -->
    <button class="btn btn-primary">Kurti sąskaitą</button>
</form>