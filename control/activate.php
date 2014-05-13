<?php
session_start();

if(isset($_GET['code'])){
    require_once('./lib/MongoDBConnection.php');
    $con = MongoDBConnection::getMongoCon(false);
    $database = $con->selectDB('m');
    $collection = $database->selectCollection('system_users');

    $user = $collection->findOne(array('ActivationCode' => $_GET['code']));

    if($user != null){
        $NewData = array('$set' => array("isActive" => true));
        $collection->update(array("ActivationCode" => $_GET['code']), $NewData);
        $_SESSION['ActivationSucceeded'] = true;
    } else {
        $_SESSION['ActivationSucceeded'] = false;
    }
    header('Location: login.php');
}

?>