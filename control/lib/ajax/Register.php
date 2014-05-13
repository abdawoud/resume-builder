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
$Username = trim($_POST['Username']);
$Password = trim($_POST['Password']);

if (filter_var($Email, FILTER_VALIDATE_EMAIL) &&
    strlen($Username) > 0 &&
    strlen($Password) > 0
) {

    require_once('../MongoDBConnection.php');
    $con = MongoDBConnection::getMongoCon(false);
    $database = $con->selectDB('m');
    $collection = $database->selectCollection('system_users');

    $user = $collection->findOne(
        array(
            '$or' => array(
                array(
                    'Username' => $Username
                ),
                array(
                    'Email' => $Email
                )
            )
        )
    );

    if($user != null){
        echo 1;
    } else {

        $ActivationCode = createRandomCode();

        $newUser = array(
            'Username' => $Username,
            'Email' => $Email,
            'Password' => md5($Password),
            'isActive' => false,
            'AccessLevel' => 2,
            'CreationDate' => time(),
            'ActivationCode' => $ActivationCode
        );

        $user = $collection->insert($newUser);

        if($user['isActive'] == false){

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

            $mail->Subject = 'Resume Builder - Activation Code';

            $msg = '<html><body><h1>Hello '.$Username.'</h1>';
            $msg .= 'click <a href="http://m-rbuilder.rhcloud.com/activate.php?code='.$ActivationCode.'">here</a> to activate your account. <br><br>';
            $msg .= 'Eslam & Saja send their regards :)</body></html>';

            $mail->msgHTML($msg);

            if(!$mail->send()) {
                //Can not send email
            }
            echo 2;
        }else{
            $_SESSION['_id'] = $user['_id'];
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['AccessLevel'] = $user['AccessLevel'];
            echo 3;
        }
    }
} else {
    echo 0;
}
?>
