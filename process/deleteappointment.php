<?php
session_start();
include_once("../connection/config.php");
$con = config::connect();
// when admin deletes appointment
if (isset($_POST['delete'])){
    $comment = $_POST['comment'];
    $availableStart = $_POST['availableStart'];
    $query = $con->prepare("DELETE FROM scheduled_appointment WHERE comment=:comment;
                            UPDATE available_appointment SET available='0' WHERE availableStart=:availableStart;");
    $query->bindParam(":comment", $comment);
    $query->bindParam(":availableStart", $availableStart);
    $query->execute();
    header("location: ../dashboard.php");
}
// when student deletes appointment
$usersID = $_SESSION['usersID'];
$availableID = $_SESSION['availableID'];
$query = $con->prepare("DELETE FROM scheduled_appointment WHERE usersID=:usersID;
                        UPDATE available_appointment SET available='0' WHERE availableID='{$_SESSION['availableID']}';");
$query->bindParam(":usersID", $usersID);
$query->execute();
header("location: ../dashboard.php");