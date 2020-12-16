<?php

include_once("../connection/config.php");

if (isset($_POST['schedule'])) {
    session_start();
    $con = config::connect();

    $course = $_POST['course'];
    $cSection = $_POST['cSection'];
    $platform = $_POST['platform'];
    $comment = $_POST['comment'];

    $currentUsersID = $_SESSION['usersID'];
    $selectedAvailableID = $_POST['availableID'];

    scheduleappointment($con, $course, $cSection, $platform, $comment, $currentUsersID, $selectedAvailableID);
    header("Location: ../dashboard.php");
}

function scheduleappointment($con, $course, $cSection, $platform, $comment, $currentUsersID, $selectedAvailableID)
{
    $query = $con->prepare("
                            INSERT INTO scheduled_appointment 
                                (course, cSection, platform, comment, usersID, availableID) 
                            VALUES 
                                (:course, :cSection, :platform, :comment, :usersID, :availableID);
                                
                            UPDATE available_appointment SET available=1 WHERE availableID=:availableID ;
                          ");
    $query->bindParam(":course", $course);
    $query->bindParam(":cSection", $cSection);
    $query->bindParam(":platform", $platform);
    $query->bindParam(":comment", $comment);
    $query->bindParam(":usersID", $currentUsersID);
    $query->bindParam(":availableID", $selectedAvailableID);
    $query->execute();
    $query->closeCursor();
    return $query;
}
