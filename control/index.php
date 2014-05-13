<?php

session_start();

if(isset($_SESSION['User_id'])){
    header('Location: dashboard.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>ResumeBuilder : Login</title>
    <!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> -->
    <meta name="demo" content="yes"/>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" id="style">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="plugins/jquery.bxslider/jquery.bxslider.css" rel="stylesheet"/>

    <!-- DookNet Style -->
    <link href="css/login.css" rel="stylesheet" id="style">

</head>
<body>

<div class="container">
    <div class="flat-form">
        <ul class="tabs">
            <li>
                <a href="#login" class="active">Login</a>
            </li>
            <li>
                <a href="#register">Register</a>
            </li>
        </ul>
        <!--/#login.form-action-->
        <div id="login" class="form-action show">
            <h1>Login</h1>

            <p>Please enter your Username and Password right here. <b><a href="forget.php">Forgot your password?</a></b>
            </p>

            <form>
                <ul class="my-form">
                    <li>
                        <input type="text" name="LoginUsername" id="LoginUsername" placeholder="Username"/>
                    </li>
                    <li>
                        <input type="password" name="LoginPassword" id="LoginPassword" placeholder="Password"/>
                    </li>
                    <li>
                        <input type="button" name="LoginSubmit" id="LoginSubmit" value="Login" class="button my-log"
                               onclick="Login()"/>
                    </li>
                </ul>
                <div id="LoginResponse">
                    <?php
                    if(isset($_SESSION['ActivationSucceeded'])){
                        if($_SESSION['ActivationSucceeded']){
                            echo 'Account activated successfully';
                        } else {
                            echo 'Activation failed!';
                        }
                        unset($_SESSION['ActivationSucceeded']);
                    }
                    ?>
                </div>
            </form>
        </div>

        <!--/#register.form-action-->

        <div id="register" class="form-action hide">
            <h1>Create Account</h1>

            <p>Please enter your Username, Email and Password. </p>

            <form>
                <ul class="my-form">
                    <li>
                        <input type="text" name="RegisterUsername" id="RegisterUsername" placeholder="Username"/>
                    </li>
                    <li>
                        <input type="text" name="RegisterEmail" id="RegisterEmail" placeholder="Email"/>
                    </li>
                    <li>
                        <input type="password" name="RegisterPassword" id="RegisterPassword" placeholder="Password"/>
                    </li>
                    <li>
                        <input type="button" name="RegisterSubmit" id="RegisterSubmit" value="Register"
                               class="button my-log" onclick="Register()"/>
                    </li>
                </ul>
                <div id="RegisterResponse">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
<script src="js/ajax/functions.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE ]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</body>

</html>
