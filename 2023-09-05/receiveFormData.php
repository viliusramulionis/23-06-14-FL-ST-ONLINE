<?php
echo '<pre>';
print_r($_GET); //Request query
print_r($_POST); //POST body duomenys
print_r($_REQUEST); //Bendrai sugrupuoti QUERY IR POST BODY duomenys
print_r($_SERVER); //Visa su užklausa susijusi informacija
print_r($_FILES); //Persiunčiamų failų informacija

//https://www.php.net/manual/en/function.move-uploaded-file.php
//Failo dydžio validacija
if($_FILES['failas']['size'] > 40000) {
    echo 'Failo dydis yra per didelis';
} else {
    if($_FILES['failas']['type'] !== 'image/png' AND 
        $_FILES['failas']['type'] !== 'image/jpeg' AND
        $_FILES['failas']['type'] !== 'image/gif'
    ) {
        echo 'Netinkamas failo formatas';
    } else {
        move_uploaded_file($_FILES['failas']['tmp_name'], './uploads/' . $_FILES['failas']['name']);
        echo 'Failas sekmingai ikeltas';
    }
}