<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$_SESSION['Page'] = 'dashboard';

if(!isset($_SESSION['User_id'])){
    header('Location: login.php');
}

require_once('./lib/MongoDBConnection.php');
$con = MongoDBConnection::getMongoCon(false);
$database = $con->selectDB('m');
$resumes = $database->selectCollection('resumes');
$system_users = $database->selectCollection('system_users');
$templates = $database->selectCollection('templates');


if(isset($_GET['delete'])){
    try{
        $resumes->remove(array('_id' => new MongoId($_GET['delete'])));
        header('Location: dashboard.php');
    }catch (Exception $e){
        header('Location: dashboard.php#users');
    }
}

$resumesCount = $resumes->count();
$exportedResumesCount = $resumes->count(array('isComplete' => true));
$usersCount = $system_users->count();
$templatesCount = $templates->count();

?>
<!DOCTYPE html>
<html>

<head>
    <title>ResumeBuilder - Dashboard</title>
    <!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> -->
    <meta name="demo" content="yes" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" id="style">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/switcher.css" rel="stylesheet">
    <link href="plugins/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="plugins/bootstrap-switch.css" rel="stylesheet" />


    <!-- DookNet Style -->
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
        <?php
        if(isset($_SESSION['AccessLevel']) && $_SESSION['AccessLevel'] == 1){
            $resumes_cursor = $resumes->find();
            $system_users_cursor = $system_users->find();

            $resumes_cursor->sort(array('_id' => -1));
            $system_users_cursor->sort(array('_id' => -1));
        ?>
            <div class="col-md-9 basic">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#resumes" data-toggle="tab"><i class="glyphicon glyphicon-th-list"></i> All Resumes </a>
                    </li>
                    <li><a href="#users" data-toggle="tab"><i class="glyphicon glyphicon-user"></i> Users </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="resumes">
                        <div id="rooms_display">
                            <table class="table table-striped table-bordered table-hover" id="rooms_table">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Theme</th>
                                    <th>Creation Date</th>
                                    <th>Exported</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($resumes_cursor as $resume) {
                                    $user = $system_users->findOne(array('_id' => $resume['User_id']), array('Username' => 1));
                                    $template = $templates->findOne(array('_id' => $resume['Template_id']), array('Name' => 1));
                                ?>
                                <tr class="odd gradeX">
                                    <td><?=$user['Username']?></td>
                                    <td><?=$template['Name']?></td>
                                    <td><?=date("Y-m-d H:i:s",$resume['CreationDate'])?></td>
                                    <td><?=($resume['isComplete'])? 'Yes': 'No';?></td>
                                    <td><a href="./app/resumes/<?=$resume['_id']?>.docx">View</a> | <a href="?type=1&delete=<?=$resume['_id']?>">Delete</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane" id="users">
                        <table class="table table-striped table-bordered table-hover" id="users_table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Access Level</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($system_users_cursor as $user) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?=$user['Username']?></td>
                                    <td><?=$user['Email']?></td>
                                    <td><?=($user['AccessLevel'] == 1)? 'Admin':'User';?></td>
                                    <td><a id="<?=$user['_id']?>" onclick="ChangeStatus(<?="'".$user['_id']."'"?>)"><?=($user['isActive'])? 'Active':'Inactive';?></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
        } else {
            $resumes_cursor = $resumes->find(array('User_id' => $_SESSION['User_id']));
            $resumes_cursor->sort(array('_id' => -1));
        ?>
            <div class="col-md-9 basic">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#resumes" data-toggle="tab"><i class="glyphicon glyphicon-th-list"></i> My Resumes </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="resumes">
                        <div id="rooms_display">
                            <table class="table table-striped table-bordered table-hover" id="rooms_table">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Theme</th>
                                    <th>Creation Date</th>
                                    <th>Exported</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($resumes_cursor as $resume) {
                                    $template = $templates->findOne(array('_id' => $resume['Template_id']), array('Name' => 1));
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?=(strcasecmp($resume['PersonalInformation']['FullName'], '') == 0)? 'Not Yet': $resume['PersonalInformation']['FullName']?></td>
                                        <td><?=$template['Name']?></td>
                                        <td><?=date("Y-m-d H:i:s",$resume['CreationDate'])?></td>
                                        <td><?=($resume['isComplete'])? 'Yes': 'No';?></td>
                                        <td><?=($resume['isComplete'])? "<a href=\"./app/resumes/".$resume['_id'].".docx\">View</a>" : 'View';?> | <a href="resume.php?r=<?=$resume['_id']?>">Edit</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- end basic -->

        <!-- start sidebar -->
        <div class="col-md-3 sidebar">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Quick info</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><span class="badge"><?=$usersCount?></span>Number of Users</li>
                        <li class="list-group-item"><span class="badge"><?=$resumesCount?></span>Number of Resumes</li>
                        <li class="list-group-item"><span class="badge"><?=$exportedResumesCount?></span>Exported Resumes</li>
                        <li class="list-group-item"><span class="badge"><?=$templatesCount?></span>Numer of Templates</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end sidebar -->
    </div>
    <!-- End mybody -->




    <!-- Footer -->
    <footer class="myfooter myrow navbar-default hidden">
        <div class="container navbar-brand">
            All rights reserved ResumeBuilder &copy; 2014
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
