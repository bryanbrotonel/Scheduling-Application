<?php

if (isset($_POST['schedule'])) {
    $con = config::connect();

    $course = $_POST['course'];
    $cSection = $_POST['cSection'];
    $platform = $_POST['platform'];
    $comment = $_POST['comment'];

    $currentUsersID = $_SESSION['usersID'];
    $selectedAvailableID = $_SESSION['availableID'];

    scheduleappointment($con, $course, $cSection, $platform, $comment, $currentUsersID, $selectedAvailableID);
    header("Location: ../dashboard.php");
}
