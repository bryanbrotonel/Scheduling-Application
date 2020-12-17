<?php
session_start();
$usersID = $_SESSION['usersID'];
$availableID = $_POST['availableID'];
$_SESSION['availableID'] = $availableID;
include_once("connection/config.php");

include 'header.php';
include 'src/appointment.php';
include 'footer.php';