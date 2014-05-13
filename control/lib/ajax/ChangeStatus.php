<?php

session_start();

$_id = trim($_POST['_id']);

if (strlen($_id) == 24) {

    try{

        require_once('../MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $collection = $database->selectCollection('system_users');

        $userRecord = $collection->findOne(array('_id' => new MongoId($_id)), array('isActive' => 1));
        if($userRecord == null){
            echo -1;
        } else {
            $user = $collection->update(array('_id' => new MongoId($_id)), array('$set' => array('isActive' => !$userRecord['isActive'])));
            echo !$userRecord['isActive'];
        }
    } catch (Exception $e){
        echo -1;
    }


} else {
    echo -1;
}

?>
