<?php
include_once("../connection/config.php");
session_start();

if (isset($_POST['updateSchedule'])) {
    $con = config::connect();
    $course = $_POST['course'];
    $cSection = $_POST['cSection'];
    $platform = $_POST['platform'];
    $comment = $_POST['comment'];

    $currentUserID = $_SESSION['usersID'];
    $currentAvailableID = $_SESSION['availableID'];

    $query = $con->prepare("SELECT * FROM scheduled_appointment WHERE usersID=:usersID AND availableID=:availableID;");
    $query->bindParam(":usersID", $currentUserID);
    $query->bindParam(":availableID", $currentAvailableID);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $usersID = $result['usersID'];
    $availableID = $result['availableID'];

    updateSchedule($con, $course, $cSection, $platform, $comment, $currentUserID, $currentAvailableID);
    header("Location: ../dashboard.php");
}

function updateSchedule($con, $course, $cSection, $platform, $comment, $currentUserID, $currentAvailableID)
{
    $query = $con->prepare("UPDATE scheduled_appointment SET course=:course, cSection=:cSection, platform=:platform, comment=:comment
                            WHERE usersID=:usersID AND availableID=:availableID;");
    $query->bindParam(":course", $course);
    $query->bindParam(":cSection", $cSection);
    $query->bindParam(":platform", $platform);
    $query->bindParam(":comment", $comment);
    $query->bindParam(":usersID", $currentUserID);
    $query->bindParam(":availableID", $currentAvailableID);
    $query->execute();
    return;
}