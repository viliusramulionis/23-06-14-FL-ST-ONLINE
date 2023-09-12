<?php 

$archive = new ZipArchive;

$archive->open('archyvas.zip');

$archive->extractTo('./extracted');

$archive->close();