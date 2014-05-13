<?php

session_start();

$_SESSION['Page'] = 'resume';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['r'])) {
    header('Location: dashboard.php');
}

try {
    require_once('./lib/MongoDBConnection.php');
    $con = MongoDBConnection::getMongoCon(true);
    $database = $con->selectDB('m');
    $resumes = $database->selectCollection('resumes');
    $resume = $resumes->findOne(array('_id' => new MongoId($_GET['r']), 'User_id' => new MongoId($_SESSION['User_id'])));

    $templates = $database->selectCollection('templates');
    $templates_cursor = $templates->find();
    $templates_cursor->sort(array('_id' => 1));

    if ($resume == null) {
        header('Location: dashboard.php');
    }

} catch (Exception $e) {
    header('Location: dashboard.php');
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
<h3>New Resume</h3>

<div class="row">
<div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#personal-info" data-toggle="pill">Personal Information</a>
        </li>
        <li><a href="#education" data-toggle="pill">Education</a>
        </li>
        <li><a href="#skills" data-toggle="pill">Technical Skills</a>
        </li>
        <li><a href="#experience" data-toggle="pill">Working Experience</a>
        </li>
        <li><a href="#template" data-toggle="pill">Template</a>
        </li>
        <li><a href="#finish" data-toggle="pill">Finish</a>
        </li>
    </ul>
</div>
<div class="col-md-9">
<div class="tab-content">
<div class="tab-pane active" id="personal-info">
    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                <form class="bs-example form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label for="inputInstitute"
                                   class="col-lg-2 control-label">Full Name</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputFullName"
                                       id="inputFullName"
                                       placeholder="Eslam Abu-Salim" <?= (strcasecmp($resume['PersonalInformation']['FullName'], '') == 0) ? '' : 'value="' . $resume['PersonalInformation']['FullName'] . '"' ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSpecialisation" class="col-lg-2 control-label">BirthDate</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       name="inputBirthDate" id="inputBirthDate"
                                       placeholder="4/1/1993" <?= (strcasecmp($resume['PersonalInformation']['BirthDate'], '') == 0) ? '' : 'value="' . $resume['PersonalInformation']['BirthDate'] . '"' ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputYear" class="col-lg-2 control-label">Address</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputAddress"
                                       id="inputAddress"
                                       placeholder="Gaza, Palestine" <?= (strcasecmp($resume['PersonalInformation']['Address'], '') == 0) ? '' : 'value="' . $resume['PersonalInformation']['Address'] . '"' ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCourses"
                                   class="col-lg-2 control-label">Phone Number</label>

                            <div class="col-lg-10">
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="inputPhoneNumber"
                                           id="inputPhoneNumber"
                                           placeholder="(970) 5923-232323" <?= (strcasecmp($resume['PersonalInformation']['PhoneNumber'], '') == 0) ? '' : 'value="' . $resume['PersonalInformation']['PhoneNumber'] . '"' ?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="dashboard.php">
                                    <button class="btn btn-default">Cancel</button>
                                </a>
                                <button id="personalInfoSubmit" name="personalInfoSubmit" type="button"
                                        class="btn btn-primary" onclick="UpdatePersonalInformation(<?="'".$_GET['r']."'"?>)">Save
                                </button>
                            </div>
                        </div>
                    </fieldset>
                    <div id="personalInformationResponse">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="education">
    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                <form class="bs-example form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label for="inputInstitute"
                                   class="col-lg-2 control-label">Institute</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputInstitute"
                                       id="inputInstitute"
                                       placeholder="Islamic University of Gaza - IUG" <?= (strcasecmp($resume['Education']['Institute'], '') == 0) ? '' : 'value="' . $resume['Education']['Institute'] . '"' ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSpecialisation" class="col-lg-2 control-label">College</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control"
                                       name="inputSpecialisation" id="inputSpecialisation"
                                       placeholder="Information Technology - Software Engineering" <?= (strcasecmp($resume['Education']['College'], '') == 0) ? '' : 'value="' . $resume['Education']['College'] . '"' ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputYear" class="col-lg-2 control-label">Year</label>

                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputYear"
                                       id="inputYear"
                                       placeholder="June 2014" <?= (strcasecmp($resume['Education']['Year'], '') == 0) ? '' : 'value="' . $resume['Education']['Year'] . '"' ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCourses"
                                   class="col-lg-2 control-label">Courses</label>

                            <div class="col-lg-10">
                                <textarea rows="3" class="form-control" name="inputCourses"
                                          id="inputCourses"
                                          placeholder="Advanced Internet Technologies, Operating Systems..."><?= (strcasecmp($resume['Education']['Courses'], '') == 0) ? '' : $resume['Education']['Courses'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="dashboard.php">
                                    <button class="btn btn-default">Cancel</button>
                                </a>
                                <button id="educationSubmit" name="educationSubmit" type="button"
                                        class="btn btn-primary" onclick="UpdateEducation(<?="'".$_GET['r']."'"?>)">Save
                                </button>
                            </div>
                        </div>
                    </fieldset>
                    <div id="educationResponse">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="skills">
    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                <form class="bs-example form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label for="inputProgrammingLanguages"
                                   class="col-lg-2 control-label">Programming Languages</label>

                            <div class="col-lg-10">
                                <textarea rows="3" class="form-control" name="inputProgrammingLanguages"
                                          id="inputProgrammingLanguages"
                                          placeholder="Desktop (Java, C and C++, and C#), Mobile (Android, and iOS), Web (PHP,Javascript-NodeJS, and JSP)"><?= (strcasecmp($resume['TechnicalSkills']['ProgrammingLanguages'], '') == 0) ? '' : $resume['TechnicalSkills']['ProgrammingLanguages'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDatabases"
                                   class="col-lg-2 control-label">Databases</label>

                            <div class="col-lg-10">
                                <textarea rows="3" class="form-control" name="inputDatabases"
                                          id="inputDatabases"
                                          placeholder="SQL (Oracle 10g, MySQL, MS SQL Server), Non-SQL (MongoDB)"><?= (strcasecmp($resume['TechnicalSkills']['Databases'], '') == 0) ? '' : $resume['TechnicalSkills']['Databases'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputOperatingSystems"
                                   class="col-lg-2 control-label">Operating Systems</label>

                            <div class="col-lg-10">
                                <textarea rows="3" class="form-control" name="inputOperatingSystems"
                                          id="inputOperatingSystems"
                                          placeholder="Windows, Ubuntu Distribution, MacOS"><?= (strcasecmp($resume['TechnicalSkills']['OperatingSystems'], '') == 0) ? '' : $resume['TechnicalSkills']['OperatingSystems'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="dashboard.php">
                                    <button class="btn btn-default">Cancel</button>
                                </a>
                                <button id="skillsSubmit" name="skillsSubmit" type="button" class="btn btn-primary" onclick="UpdateTechnicalSkills(<?="'".$_GET['r']."'"?>)">
                                    Save
                                </button>
                            </div>
                        </div>
                    </fieldset>
                    <div id="skillsResponse">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="experience">
<div class="row">
<div class="col-lg-8">
<div class="well">
<form class="bs-example form-horizontal">
<fieldset>

    <div class="form-group">
        <label for="inputWorkingExperienceDescription_1"
               class="col-lg-2 control-label">#1</label>
    </div>

    <div class="form-group">
        <label for="inputWorkingExperienceOrganisation_1"
               class="col-lg-2 control-label">Organisation</label>

        <div class="col-lg-10">
            <input type="text" class="form-control" name="inputWorkingExperienceOrganisation_1"
                   id="inputWorkingExperienceOrganisation_1"
                   placeholder="Islamic University of Gaza - IUG" <?= (strcasecmp($resume['WorkingExperience'][0]['Organisation'], '') == 0) ? '' : 'value="' . $resume['WorkingExperience'][0]['Organisation'] . '"' ?>>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperiencePosition_1"
               class="col-lg-2 control-label">Position</label>

        <div class="col-lg-10">
            <input type="text" class="form-control" name="inputWorkingExperiencePosition_1"
                   id="inputWorkingExperiencePosition_1"
                   placeholder="Web Developer" <?= (strcasecmp($resume['WorkingExperience'][0]['Position'], '') == 0) ? '' : 'value="' . $resume['WorkingExperience'][0]['Position'] . '"' ?>>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperienceFrom_1"
               class="col-lg-2 control-label">From</label>

        <div class="col-lg-10">
            <select id="inputWorkingExperienceFrom_1" name="inputWorkingExperienceFrom_1"
                    class="form-control" data-placeholder="From" tabindex="-1">
                <?php
                for ($i = 2014; $i > 1980; $i--) {
                    if (strcasecmp($resume['WorkingExperience'][0]['From'], $i) == 0) {
                        ?>
                        <option selected value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    } else {
                        ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperienceTo_1"
               class="col-lg-2 control-label">To</label>

        <div class="col-lg-10">
            <select id="inputWorkingExperienceTo_1" name="inputWorkingExperienceTo_1"
                    class="form-control" data-placeholder="To" tabindex="-1">
                <option <?= (strcasecmp($resume['WorkingExperience'][0]['To'], 'Present') == 0) ? 'selected' : '' ?>
                    value="Present">Present
                </option>
                <?php
                for ($i = 2014; $i > 1980; $i--) {
                    if (strcasecmp($resume['WorkingExperience'][0]['To'], $i) == 0) {
                        ?>
                        <option selected value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    } else {
                        ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperienceDuties_1"
               class="col-lg-2 control-label">Duties</label>

        <div class="col-lg-10">
            <textarea rows="3" class="form-control" name="inputWorkingExperienceDuties_1"
                      id="inputWorkingExperienceDuties_1"
                      placeholder="Designing websites, web development"><?= (strcasecmp($resume['WorkingExperience'][0]['Duties'], '') == 0) ? '' : $resume['WorkingExperience'][0]['Duties'] ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="inputWorkingExperienceDescription_2"
               class="col-lg-2 control-label">#2</label>
    </div>

    <div class="form-group">
        <label for="inputWorkingExperienceOrganisation_2"
               class="col-lg-2 control-label">Organisation</label>

        <div class="col-lg-10">
            <input type="text" class="form-control" name="inputWorkingExperienceOrganisation_2"
                   id="inputWorkingExperienceOrganisation_2"
                   placeholder="Islamic University of Gaza - IUG" <?= (strcasecmp($resume['WorkingExperience'][1]['Organisation'], '') == 0) ? '' : 'value="' . $resume['WorkingExperience'][1]['Organisation'] . '"' ?>>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperiencePosition_2"
               class="col-lg-2 control-label">Position</label>

        <div class="col-lg-10">
            <input type="text" class="form-control" name="inputWorkingExperiencePosition_2"
                   id="inputWorkingExperiencePosition_2"
                   placeholder="Web Developer" <?= (strcasecmp($resume['WorkingExperience'][1]['Position'], '') == 0) ? '' : 'value="' . $resume['WorkingExperience'][1]['Position'] . '"' ?>>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperienceFrom_2"
               class="col-lg-2 control-label">From</label>

        <div class="col-lg-10">
            <select id="inputWorkingExperienceFrom_2" name="inputWorkingExperienceFrom_2"
                    class="form-control" data-placeholder="From" tabindex="-1">
                <option selected
                        value="<?= $resume['WorkingExperience'][1]['From'] ?>"><?= $resume['WorkingExperience'][1]['From'] ?></option>
                <?php
                for ($i = 2014; $i > 1980; $i--) {
                    if (strcasecmp($resume['WorkingExperience'][1]['From'], $i) == 0) {
                        ?>
                        <option selected value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    } else {
                        ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperienceTo_2"
               class="col-lg-2 control-label">To</label>

        <div class="col-lg-10">
            <select id="inputWorkingExperienceTo_2" name="inputWorkingExperienceTo_2"
                    class="form-control" data-placeholder="To" tabindex="-1">
                <option <?= (strcasecmp($resume['WorkingExperience'][1]['To'], 'Present') == 0) ? 'selected' : '' ?>
                    value="Present">Present
                </option>
                <?php
                for ($i = 2014; $i > 1980; $i--) {
                    if (strcasecmp($resume['WorkingExperience'][1]['To'], $i) == 0) {
                        ?>
                        <option selected value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    } else {
                        ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputWorkingExperienceDuties_2"
               class="col-lg-2 control-label">Duties</label>

        <div class="col-lg-10">
            <textarea rows="3" class="form-control" name="inputWorkingExperienceDuties_2"
                      id="inputWorkingExperienceDuties_2"
                      placeholder="Designing websites, web development"><?= (strcasecmp($resume['WorkingExperience'][1]['Duties'], '') == 0) ? '' : $resume['WorkingExperience'][1]['Duties'] ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <a href="dashboard.php">
                <button class="btn btn-default">Cancel</button>
            </a>
            <button id="experienceSubmit" name="experienceSubmit" type="button"
                    class="btn btn-primary" onclick="UpdateWorkingExperience(<?="'".$_GET['r']."'"?>)">Save
            </button>
        </div>
    </div>
</fieldset>
<div id="experienceResponse">
</div>
</form>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="template">
    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                <form class="bs-example form-horizontal" id="templateForm">
                    <fieldset>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-3">
                                <?php
                                foreach ($templates_cursor as $Template) {
                                ?>
                                    <img width="300" src="templates/<?=$Template['ImageName']?>"><input type="radio" name="Template" id="Template" <?=(strcasecmp($resume['Template_id'], $Template['_id']) == 0)?'checked':''?> value="<?=$Template['_id']?>"><?=$Template['Name']?><br><br><br>
                                <?php
                                }
                                ?>
                                <br>
                            </div>
                            <div class="col-lg-10 col-lg-offset-2">
                                <a href="dashboard.php">
                                    <button class="btn btn-default">Cancel</button>
                                </a>
                                <button id="templateSubmit" name="templateSubmit" type="button" class="btn btn-primary" onclick="UpdateTemplate(<?="'".$_GET['r']."'"?>)">
                                    Save
                                </button>
                            </div>
                        </div>
                        <div id="templateResponse">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane" id="finish">
    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                <form class="bs-example form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <br/>

                            <div class="col-lg-10 col-lg-offset-3">
                                <button class="btn btn-lg btn-success" type="button" onclick="Finish(<?="'".$_GET['r']."'"?>)">Click here to export your resume
                                </button>
                            </div>
                        </div>
                    </fieldset>
                    <div id="exportResponse">
                    </div>
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
