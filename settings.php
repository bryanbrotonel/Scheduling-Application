<?php

include_once("connection/config.php");
session_start();
$con = config::connect();

$username = $_SESSION['usersUsername'];

$user = getUserInfo($con, $username);

function getUserInfo($con, $username)
{
    $query = $con->prepare("SELECT * FROM users WHERE usersUsername='$username'");
    $query->execute();
    
    return $query->fetch();
}

include 'header.php';
include 'src/settings.php';
include 'footer.php';