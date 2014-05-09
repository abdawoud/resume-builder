<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$xsltFile = "MyMovies.php";
$sourceTemplate = "MyMoviesTemplate.docx";
$outputDocument = "MyMovies.docx";

ob_start();
include($xsltFile);
$newContent = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'.ob_get_contents();
ob_end_clean();

//Copy the Word 2007 template document to the output file.
if (copy($sourceTemplate, $outputDocument)) {

    //Open XML files are packaged following the Open Packaging
    //Conventions and can be treated as zip files when
    //accessing their content.
    $zipArchive = new ZipArchive();
    $zipArchive->open($outputDocument);

    //Replace the content with the new content created above.
    //In the Open XML Wordprocessing format content is stored
    //in the document.xml file located in the word directory.
    $zipArchive->addFromString("word/document.xml", $newContent);
    $zipArchive->close();

    echo "Processing Complete";
}
?>
