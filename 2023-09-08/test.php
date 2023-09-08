<?php
if (!isset($_GET['action'])) :
?>
    <form method="post">
    <?php endif; ?>
    <input type="text" name="test1">
    <form method="post">
        <input type="text" name="test2">
        <button>Send</button>
    </form>
    <button>Send</button>
    <?php
    if (!isset($_GET['action'])) :
    ?>
    </form>
<?php endif; ?>
<?php

print_r($_POST);
