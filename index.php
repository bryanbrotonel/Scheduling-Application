<?php
include_once("connection/config.php");
$con=config::connect();

$results=fetchRecords($con);
function fetchRecords($con){
    $query = $con->prepare("SELECT * FROM users;");
    $query->execute();
    return $query->fetchAll();
}

include 'header.php';
include 'src/home.php';
include 'footer.php';