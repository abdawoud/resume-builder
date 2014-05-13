<?php

session_start();

$_SESSION['Page'] = 'resume';
$_SESSION['isCaptchaTrue'] = true;

if( !isset($_SESSION['User_id']) ){
    header('Location: index.php');
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['create'])) {

    require_once('./lib/recaptchalib.php');
    $PrivateKey = "6LeRXfMSAAAAADhhrvu6uCE8bvWua5InL0VXs8bZ";
    $resp = recaptcha_check_answer(
        $PrivateKey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]
    );

    if (!$resp->is_valid) {

        $_SESSION['isCaptchaTrue'] = false;

    } else {

        require_once('./lib/MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');

        $templates = $database->selectCollection('templates');

        $template = $templates->findOne(array('isDefault' => true), array('_id' => 1));

        $PersonalInformation = array(
            'FullName' => '',
            'BirthDate' => '',
            'Address' => '',
            'PhoneNumber' => ''
        );

        $Education = array(
            'Institute' => '',
            'College' => '',
            'Year' => '',
            'Courses' => ''
        );

        $TechnicalSkills = array(
            'ProgrammingLanguages' => '',
            'Databases' => '',
            'OperatingSystems' => ''
        );

        $WorkingExperience_1 = array(
            'Organisation' => '',
            'Position' => '',
            'From' => '',
            'To' => '',
            'Duties' => ''
        );

        $WorkingExperience_2 = array(
            'Organisation' => '',
            'Position' => '',
            'From' => '',
            'To' => '',
            'Duties' => ''
        );

        $WorkingExperience = array($WorkingExperience_1, $WorkingExperience_2);

        $Resume = array(
            'User_id' => new MongoId($_SESSION['User_id']),
            'CreationDate' => time(),
            'PersonalInformation' => $PersonalInformation,
            'Education' => $Education,
            'TechnicalSkills' => $TechnicalSkills,
            'WorkingExperience' => $WorkingExperience,
            'Template_id' => new MongoId($template['_id']),
            'isComplete' => false
        );

        $resumes->insert($Resume);

        $Resume_id = $Resume['_id'];

        $_SESSION['Resume_id'] = $Resume_id;

        unset($_SESSION['isCaptchaTrue']);

        header('Location: resume.php?r='.$Resume_id);

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>ResumeBuilder - New Resume</title>
    <!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> -->
    <meta name="demo" content="yes"/>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" id="style">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/switcher.css" rel="stylesheet">
    <link href="plugins/jquery.bxslider/jquery.bxslider.css" rel="stylesheet"/>
    <link href="plugins/bootstrap-switch.css" rel="stylesheet"/>


    <!-- ResumeBuilder Style -->
    <link href="css/custom.css" rel="stylesheet" id="style">
    <link href="css/dashboard.css" rel="stylesheet" id="style">
    <link href="css/responsive.css" rel="stylesheet" id="style">

</head>

<body id="dashboard">

<!-- switcher -->
<?php
require_once('./sections/themes-switcher.php');
?>
<!-- End Switcher -->

<!-- Start myheader -->
<?php
require_once('./sections/navigation-bar.php');
?>
<!-- End myheader -->

<!-- Start mybody -->
<div class="mybody myrow">
    <!-- start basic -->
    <div class="row">
        <div id="rooms_edit_tab">
            <h3>Creating New Resume: Anti-bot Test</h3>

            <div class="row">
                <div class="col-md-16">
                    <div class="tab-content">
                        <div class="tab-pane active" id="start">
                            <div class="row">
                                <div class="col-lg-16">
                                    <div class="well">
                                        <form class="bs-example form-horizontal" method="POST" action="init.php">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="col-lg-10 col-lg-offset-4">
                                                        <br/>
                                                        <?php
                                                        require_once('./lib/recaptchalib.php');
                                                        $PublicKey = "6LeRXfMSAAAAAAQWJBWOIA_ghogY5sz2dsg4-gU8";
                                                        echo recaptcha_get_html($PublicKey);
                                                        ?>
                                                        <button name="create" class="btn btn-lg btn-success"
                                                                type="submit">Click here to start creating your resume
                                                        </button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <?php
                                            if(!$_SESSION['isCaptchaTrue']){
                                            ?>
                                            <div id="educationResponse">
                                                <div style="align-content: center" class="alert alert-warning">Captcha is wrong!</div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End mybody -->

<!-- Footer -->
<footer class="myfooter myrow navbar-default hidden">
    <div class="container navbar-brand">
        All rights reserved DoookNet &copy; 2014
    </div>
</footer>
<!-- End Footer -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/switcher.js"></script>
<script src="js/holder.js"></script>
<script src="plugins/jquery.bxslider/jquery.bxslider.min.js"></script>
<script src="plugins/data_tables/data_tables.js"></script>
<script src="plugins/bootstrap-switch.js"></script>


<script src="js/custom.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE ]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<script src="js/ajax/functions.js"></script>
</body>

</html>
