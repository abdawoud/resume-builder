<?php

session_start();

$Action = trim($_POST['Action']);
$Resume_id = trim($_POST['Resume_id']);

if(strcasecmp($Action, 'PersonalInfo') == 0){

    $FullName = trim($_POST['FullName']);
    $BirthDate = trim($_POST['BirthDate']);
    $Address = trim($_POST['Address']);
    $PhoneNumber = trim($_POST['PhoneNumber']);
    try{
        require_once('../MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');

        $resume = $resumes->findOne(array("_id" => $Resume_id, "User_id" => $_SESSION['User_id']), array("PersonalInformation" => 1));

        $resume['PersonalInformation']['FullName'] = $FullName;
        $resume['PersonalInformation']['BirthDate'] = $BirthDate;
        $resume['PersonalInformation']['Address'] = $Address;
        $resume['PersonalInformation']['PhoneNumber'] = $PhoneNumber;

        $newData = array(
            '$set' => array(
                "PersonalInformation" => $resume['PersonalInformation']
            )
        );

        $resumes->update(
            array(
                "_id" => new MongoId($Resume_id), "User_id" => new MongoId($_SESSION['User_id'])
            ),
            $newData
        );

        echo 1;

    }catch(Exception $e){
        echo 0;
    }

} elseif(strcasecmp($Action, 'Education') == 0){

    $Institute = trim($_POST['Institute']);
    $College = trim($_POST['College']);
    $Year = trim($_POST['Year']);
    $Courses = trim($_POST['Courses']);
    try{
        require_once('../MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');

        $resume = $resumes->findOne(array("_id" => $Resume_id, "User_id" => $_SESSION['User_id']), array("Education" => 1));

        $resume['Education']['Institute'] = $Institute;
        $resume['Education']['College'] = $College;
        $resume['Education']['Year'] = $Year;
        $resume['Education']['Courses'] = $Courses;

        $newData = array(
            '$set' => array(
                "Education" => $resume['Education']
            )
        );

        $resumes->update(
            array(
                "_id" => new MongoId($Resume_id), "User_id" => new MongoId($_SESSION['User_id'])
            ),
            $newData
        );

        echo 1;

    }catch(Exception $e){
        echo 0;
    }

} elseif(strcasecmp($Action, 'TechnicalSkills') == 0){

    $ProgrammingLanguages = trim($_POST['ProgrammingLanguages']);
    $Databases = trim($_POST['Databases']);
    $OperatingSystems = trim($_POST['OperatingSystems']);
    try{
        require_once('../MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');

        $resume = $resumes->findOne(array("_id" => $Resume_id, "User_id" => $_SESSION['User_id']), array("TechnicalSkills" => 1));

        $resume['TechnicalSkills']['ProgrammingLanguages'] = $ProgrammingLanguages;
        $resume['TechnicalSkills']['Databases'] = $Databases;
        $resume['TechnicalSkills']['OperatingSystems'] = $OperatingSystems;

        $newData = array(
            '$set' => array(
                "TechnicalSkills" => $resume['TechnicalSkills']
            )
        );

        $resumes->update(
            array(
                "_id" => new MongoId($Resume_id), "User_id" => new MongoId($_SESSION['User_id'])
            ),
            $newData
        );

        echo 1;

    }catch(Exception $e){
        echo 0;
    }

} elseif(strcasecmp($Action, 'WorkingExperience') == 0){

    $Organisation_1 = trim($_POST['Organisation_1']);
    $Position_1 = trim($_POST['Position_1']);
    $From_1 = trim($_POST['From_1']);
    $To_1 = trim($_POST['To_1']);
    $Duties_1 = trim($_POST['Duties_1']);

    $Organisation_2 = trim($_POST['Organisation_2']);
    $Position_2 = trim($_POST['Position_2']);
    $From_2 = trim($_POST['From_2']);
    $To_2 = trim($_POST['To_2']);
    $Duties_2 = trim($_POST['Duties_2']);

    try{
        require_once('../MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');

        $resume = $resumes->findOne(array("_id" => $Resume_id, "User_id" => $_SESSION['User_id']), array("WorkingExperience" => 1));

        $resume['WorkingExperience'][0]['Organisation'] = $Organisation_1;
        $resume['WorkingExperience'][0]['Position'] = $Position_1;
        $resume['WorkingExperience'][0]['From'] = $From_1;
        $resume['WorkingExperience'][0]['To'] = $To_1;
        $resume['WorkingExperience'][0]['Duties'] = $Duties_1;
        $resume['WorkingExperience'][1]['Organisation'] = $Organisation_2;
        $resume['WorkingExperience'][1]['Position'] = $Position_2;
        $resume['WorkingExperience'][1]['From'] = $From_2;
        $resume['WorkingExperience'][1]['To'] = $To_2;
        $resume['WorkingExperience'][1]['Duties'] = $Duties_2;

        $newData = array(
            '$set' => array(
                "WorkingExperience" => $resume['WorkingExperience']
            )
        );

        $resumes->update(
            array(
                "_id" => new MongoId($Resume_id), "User_id" => new MongoId($_SESSION['User_id'])
            ),
            $newData
        );

        echo 1;

    }catch(Exception $e){
        echo 0;
    }

} elseif(strcasecmp($Action, 'Template') == 0){

    $Template_id = trim($_POST['Template_id']);

    try{
        require_once('../MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');

        $newData = array(
            '$set' => array(
                "Template_id" => new MongoId($Template_id)
            )
        );

        $resumes->update(
            array(
                "_id" => new MongoId($Resume_id), "User_id" => new MongoId($_SESSION['User_id'])
            ),
            $newData
        );

        echo 1;

    }catch(Exception $e){
        echo 0;
    }

} elseif(strcasecmp($Action, 'Finish') == 0){

    try{
        require_once('../MongoDBConnection.php');
        $con = MongoDBConnection::getMongoCon(false);
        $database = $con->selectDB('m');
        $resumes = $database->selectCollection('resumes');

        $newData = array(
            '$set' => array(
                "isComplete" => true
            )
        );

        $resumes->update(
            array(
                "_id" => new MongoId($Resume_id), "User_id" => new MongoId($_SESSION['User_id'])
            ),
            $newData
        );

        header('Location: ../../app/generate.php?r='.$Resume_id);

    }catch(Exception $e){
        echo 0;
    }

}

?>