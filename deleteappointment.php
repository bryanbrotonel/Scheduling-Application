<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once("config.php");
$con = config::connect();


if (isset($_POST['delete'])){
    $comment = $_POST['comment'];
    $availableStart = $_POST['availableStart'];
    $query = $con->prepare("
                DELETE FROM scheduled_appointment WHERE comment=:comment;
                UPDATE available_appointment SET available='0' WHERE availableStart=:availableStart;
        ");
    $query->bindParam(":comment", $comment);
    $query->bindParam(":availableStart", $availableStart);
    $query->execute();
    header("location: profile.php");
}

$usersID = $_SESSION['usersID'];
$availableID = $_SESSION['availableID'];
$query = $con->prepare("
                DELETE FROM scheduled_appointment WHERE usersID=:usersID;
                UPDATE available_appointment SET available='0' WHERE availableID='{$_SESSION['availableID']}';
        ");
$query->bindParam(":usersID", $usersID);
$query->execute();
header("location: profile.php");
