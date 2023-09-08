<!-- 
    M - Model (Informacijos padavimas)
    V - View (Informacijos atvaizdavimas)
    C - Controller (Informacijos apjungimas)
-->
<?php 
    require_once 'file.php';

    // include ''; //include komanda neradus failo išmeta įspėjimą, tačiau nenutraukia kompiliavimo
    // require ''; //require komanda neradus failo išmeta kritinę klaidą ir nutraukia kompoliaciją
    // include_once ''; //include_once komanda neleidžia importuoti to paties failo du kartus, bet nenutraukia kompiliacijos
    // require_once ''; //require_once komanda neleidžia importuoti to paties failo du kartus ir nutraukia kompiliaciją
    $page = isset($_GET['page']) ? $_GET['page'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <!-- Headeris -->
    <?php include './view/snippets/header.php'; ?>
    <main>
        <div class="container">
            <!-- Turinys -->
            <!-- Router (Marsrutizatorius) -->
            <?php
                // if($page === 'home') {
                //     include './view/home.php';
                // } elseif($page === 'about-us') {
                //     include './view/about-us.php';
                // } elseif($page === 'contacts') {
                //     include './view/contacts.php';
                // } elseif($page === 'career') {
                //     include './view/career.php';
                // } else {
                //     include './view/home.php';
                // }
            
                switch($page) {
                    case 'about-us':
                        include './view/about-us.php';
                        break;
                    case 'contacts':
                        include './view/contacts.php';
                        break;
                    case 'career':
                        include './view/career.php';
                        break;
                    default:
                        include './view/home.php';  
                }

            ?>
        </div>
    </main>
    <!-- Footeris -->
    <?php include './view/snippets/footer.php'; ?>
</body>
</html>