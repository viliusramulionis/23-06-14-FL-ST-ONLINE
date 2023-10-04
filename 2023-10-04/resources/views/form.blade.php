<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <form method="POST" action="/new-song">
        <div class="mb-3">
            <label>Dainos pavadinimas:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Autorius:</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nuoroda</label>
            <input type="text" name="link" class="form-control">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button class="btn btn-primary">Siųsti</button>
    </form>
</body>
</html>