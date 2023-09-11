<?php
    if(!isset($_SESSION['loggedin']) AND !$_SESSION['loggedin']) {
        header('Location: ?page=login');
        exit;
    }
?>

<h1>Administratorius</h1>
<p>Sveikiname prisijungus, dabar galite <a href="?page=logout">atsijungti</a></p>