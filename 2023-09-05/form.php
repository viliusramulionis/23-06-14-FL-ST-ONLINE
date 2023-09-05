<?php
    $x = 'TestinisZodis';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Forma pagal nutylėjimą duomenis perduoda GET metodu -->
    <!-- action atributas nurodo kur bus siunčiami duomenys -->
    <!-- norint persiųsti failus būtina naudoti POST metodą ir nurodyti atributą enctype="multipart/form-data" -->
    <form action="receiveFormData.php?betkas=<?= $x ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Vardas:</label>
            <input type="text" name="vardas" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pavardė:</label>
            <input type="text" name="pavarde" class="form-control">
        </div>
        <div class="mb-3">
            <label>Žinutė:</label>
            <textarea class="form-control" name="zinute"></textarea>
        </div>
        <div class="mb-3">
            <label>Pasirinkite nuotrauka:</label>
            <span>Maksimalus failo dydis: 40kb</span>
            <input type="file" class="form-control" name="failas">
        </div>
        <button class="btn btn-primary">Siųsti</button>
    </form>
</body>
</html>