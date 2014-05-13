<div class="myheader myrow">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ResumeBuilder</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ()class="active"><a href="dashboard.php">Dashboard</a></li>
                    <?php
                    if($_SESSION['AccessLevel'] === 2){
                    ?>
                    <li><a href="init.php">New Resume</a></li>
                    <?php
                    }
                    ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <img class="profile-thumb" class="media-object" alt="profile image" src="img/profile.jpg" />
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['Username']?> <b class="glyphicon glyphicon-cog"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
    </nav>
</div>