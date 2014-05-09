<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$connection = new MongoClient('mongodb://localhost/');
$dbname = $connection->selectDB('whatsbulk');
$collection = $dbname->selectCollection('users');
$cursor = $collection->find();

var_dump(iterator_to_array($cursor));
?>
