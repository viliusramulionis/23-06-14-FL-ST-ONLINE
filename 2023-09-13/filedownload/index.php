<?php
if(isset($_GET['download'])) {
    $file = $_GET['download'];

    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    header("Content-Disposition: attachment; filename=\"". basename($file) ."\""); 

    readfile($file);
    exit;
}