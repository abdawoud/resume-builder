<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$resume_id = $_GET['r'];
try {
    require_once('../lib/MongoDBConnection.php');
    $con = MongoDBConnection::getMongoCon(true);
    $database = $con->selectDB('m');
    $resumes = $database->selectCollection('resumes');
    $resume = $resumes->findOne(array('_id' => new MongoId($resume_id)));

    if($resume == null){
        header('Location: ../dashboard.php');
    }

    $templates = $database->selectCollection('templates');
    $template = $templates->findOne(array('_id' => new MongoId($resume['Template_id'])));

    if($template == null){
        header('Location: ../dashboard.php');
    }

} catch (Exception $e) {
    header('Location: dashboard.php');
}

$_SESSION['Resume_id'] = $resume_id;
$xmlGenerator = $template['DocName']."_xml_generator.php";
$sourceTemplate = $template['DocName']."_template.docx";
$outputDocument = $resume_id.".docx";

ob_start();
include($xmlGenerator);
$newContent = '<?xml version="1.0" encoding="UTF-8"?>'.ob_get_contents();
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

    rename($outputDocument, 'resumes/'.$outputDocument);

    echo $outputDocument;
}
?>
