<?php
    $puslapis = isset($_GET['puslapis']) ? $_GET['puslapis'] : false;

    if($puslapis === 'pirmas') {
        echo '<h1>Titulinis puslapis</h1>';
    }

    if($puslapis === 'antras') {
        echo '<h1>Apie Mus</h1>';
    }
?>

<a href="?puslapis=pirmas">Titulinis</a>
<a href="?puslapis=antras">Apie Mus</a>

<?php
    if($puslapis === 'pirmas') {
        echo '<a href="?veiksmas=trinti">Trinti</a>';
    }
?>