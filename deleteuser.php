<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once("config.php");
$con = config::connect();
$username = $_SESSION['usersUsername'];
$query = $con->prepare("
                DELETE FROM users WHERE usersUsername=:usersUsername;
                UPDATE available_appointment SET available='0' WHERE availableID='{$_SESSION['availableID']}';
        ");
$query->bindParam(":usersUsername", $username);
$query->execute();
header("location: index.php");
