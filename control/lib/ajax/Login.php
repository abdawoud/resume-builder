<?php

session_start();

$Username = trim($_POST['Username']);
$Password = trim($_POST['Password']);

if (strlen($Username) > 0 &&
    strlen($Password) > 0
) {

require_once('../MongoDBConnection.php');
$con = MongoDBConnection::getMongoCon(false);
$database = $con->selectDB('m');
$collection = $database->selectCollection('system_users');

$user = $collection->findOne(array('Username' => $_POST['Username'], 'Password' => md5($_POST['Password'])));

if($user == null){
    echo 1;
} else {
    if($user['isActive'] == false){
        echo 2;
    }else{
        $_SESSION['User_id'] = $user['_id'];
        $_SESSION['Username'] = $user['Username'];
        $_SESSION['AccessLevel'] = $user['AccessLevel'];
        echo 3;
    }
}

} else {
    echo 0;
}

?>
