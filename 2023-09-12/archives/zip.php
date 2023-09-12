<?php

function addFilesRecursively($archive, $path) {
    $files = scandir($path);
    unset($files[0]);
    unset($files[1]);
    
    foreach($files as $file) {
        $dir = $path . '/' . $file;
        if(is_dir( $dir)) {
            $archive->addEmptyDir( $dir );
            addFilesRecursively($archive,  $dir); 
        } else {
            echo $dir . '<br />';
            $archive->addFile( $dir);
        }
    }
}

$archive = new ZipArchive;

$archive->open('archyvas.zip', ZipArchive::CREATE);

//Norint pridėti tikslius failus arba direktorijas
// $archive->addFile('test.txt');
// $archive->addEmptyDir('TestineDirektorija');

addFilesRecursively($archive, '.');

$archive->close();