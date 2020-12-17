<?php
include_once("connection/config.php");
$con = config::connect();

$results = fetchRecords($con);
function fetchRecords($con)
{
    $query = $con->prepare("SELECT * FROM users;");
    $query->execute();
    return $query->fetchAll();
}
?>

<body>
    <?php 
    include 'header.php';
    include 'footer.php'; ?>