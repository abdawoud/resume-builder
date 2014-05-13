<!DOCTYPE html>
<html>

<head>
    <title>ResumeBuilder : Retrieving Password</title>
    <!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> -->
    <meta name="demo" content="yes" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" id="style">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="plugins/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />

    <link href="css/login.css" rel="stylesheet" id="style">
    
</head>
<body>

    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#RetrievePassword">Retrieving Password</a>
                </li>
            </ul>
            <!--/#login.form-action-->
            <div id="RetrievePassword" class="form-action show">
                <p>Enter the email you registered with and password will be sent to it</p>
                <form>
                    <ul class="my-form">
                        <li>
                            <input type="text" name="ForgetEmail" id="ForgetEmail" placeholder="Email" />
                        </li>
                        <li>
                            <input type="button" name="SendSubmit" id="SendSubmit" value="Send" class="button my-log" onclick="SendPassword()" />
                        </li>
                        <hr />
                        <li>
                            <a href="login.php"><input type="button" value="Back To Login" class="button my-log" /></a>
                        </li>
                    </ul>
                    <div id="ForgetResponse">
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
