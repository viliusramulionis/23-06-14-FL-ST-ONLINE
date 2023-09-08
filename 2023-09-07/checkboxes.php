<pre>
<?php
    print_r($_POST);
?>
</pre>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkboxes</title>
</head>
<body>
    <div>
        <button data-select>Pažymėti visus</button>
    </div>
    <form method="POST">
        <div>
            <input type="text" name="vardas" placeholder="Įveskite vardą">
        </div>
        <div>
            <input type="text" name="pavarde" placeholder="Įveskite pavarde">
        </div>
        <?php
            for($i = 0; $i < 10; $i++) {
                echo '<div>
                        <label>
                            <input type="checkbox" name="keliasIkiFailo[]" value="' . $i . '">Pavadinimas
                        </label>
                    </div>';
            }
        ?>
        <button>Siųsti</button>
    </form>
    <script>
        document.querySelector('button[data-select]').addEventListener('click', () => {
            document.querySelectorAll('input[type="checkbox"]').forEach(el => {
                el.checked = !el.checked;
            });
        });
    </script>
</body>
</html>


