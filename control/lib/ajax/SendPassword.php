<?php

session_start();

function createRandomCode() {

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $code = '' ;

    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $code = $code . $tmp;
        $i++;
    }

    return $code;

}

$Email = trim($_POST['Email']);

if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {

    require_once('../MongoDBConnection.php');
    $con = MongoDBConnection::getMongoCon(false);
    $database = $con->selectDB('m');
    $collection = $database->selectCollection('system_users');

    $user = $collection->findOne(array('Email' => $Email));

    if($user == null){
        echo 1;
    } else {

        $NewPassword = createRandomCode();

        $NewData = array('$set' => array("Password" => md5($NewPassword)));
        $collection->update(array("Email" => $Email), $NewData);

        require '../email/PHPMailer-master/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cloud.resumebuilder@gmail.com';
        $mail->Password = 'eslam123321';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 25;
        $mail->setFrom('cloud.resumebuilder@gmail.com', 'ResumeBuilder');
        $mail->addAddress($Email);
        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = 'Resume Builder - New Password';

        $msg = '<html><body><h1>Hello '.$user['Username'].'</h1>';
        $msg .= 'Your new password is: <b>'.$NewPassword.'</b><br><br>';
        $msg .= 'Eslam & Saja send their regards :)</body></html>';

        $mail->msgHTML($msg);

        if(!$mail->send()) {
            //Can not send email
        }

        echo 2;
    }

} else {
    echo 0;
}

?>
