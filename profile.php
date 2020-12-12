<?php
session_start();
include_once("config.php");
$con=config::connect();
error_reporting(E_ERROR | E_WARNING | E_PARSE); // hides warning when student doesn't have a scheduled appointment

$results=fetchRecords($con);
function fetchRecords($con){
    $query = $con->prepare("SELECT * FROM users WHERE usersUsername='{$_SESSION['usersUsername']}';");
    $query->execute();
    return $query->fetch();
}

$results2=fetchRecords2($con, $results);
function fetchRecords2($con, $results){
    $query2 = $con->prepare("SELECT * FROM scheduled_appointment WHERE usersID='{$results['usersID']}';");
    $query2->execute();
    return $query2->fetch();
}

$results3=fetchRecords3($con);
function fetchRecords3($con){
    $query3 = $con->prepare("SELECT * FROM available_appointment WHERE available='0'");
    $query3->execute();
    return $query3->fetchAll();
}

$results4=fetchRecords4($con, $results2);
function fetchRecords4($con, $results2){
    $query4 = $con->prepare("SELECT * FROM available_appointment WHERE availableID='{$results2['availableID']}';");
    $query4->execute();
    return $query4->fetch();
}

$results5=fetchRecords5($con);
function fetchRecords5($con){
    $query5 = $con->prepare("
                        SELECT users.usersName, users.usersEmail, available_appointment.availableDate, available_appointment.availableStart,
                        scheduled_appointment.course, scheduled_appointment.cSection, scheduled_appointment.platform, scheduled_appointment.comment
                        FROM scheduled_appointment 
                        INNER JOIN users ON users.usersID=scheduled_appointment.usersID
                        INNER JOIN available_appointment ON available_appointment.availableID=scheduled_appointment.availableID;
            ");
    $query5->execute();
    return $query5->fetchAll();
}

$_SESSION['usersID'] = $results['usersID']; // current logged in user id
$_SESSION['availableID'] = $results2['availableID']; // availableID of scheduled appointment if set

// all users view
echo "<h1>Profile</h1>";
echo "Welcome " . $results['usersName'] . "&nbsp;/&nbsp;" . $_SESSION['usersUsername'] . "<br>";
echo "<br>";
echo "<a href='logout.php'>Logout</a> &nbsp;";
echo "<a href='updateuser.php'>Update User</a> &nbsp;";

if ($results['accountID'] == 2){ // student view
    echo "<a href='deleteuser.php'>Delete User</a>";
    echo "<br><br>";

        if (isset($_SESSION['availableID'])){
            echo "<a href='updateappointment.php'>Update Appointment</a> &nbsp;";
            echo "<a href='deleteappointment.php'>Delete Appointment</a>";
            echo "<br><br>";
            echo "Your scheduled appointments:<br>";
            echo "&nbsp;&nbsp;&nbsp;";
            echo "Appointment scheduled for: ";
            echo $results4['availableDate'] . " " . $results4['availableStart'] . " " . $results4['availableEnd'];
            echo "<br>&nbsp;&nbsp;&nbsp;";
            echo "Appointment details: ";
            echo $results2['course'] . " " . $results2['cSection'] . " " . $results2['platform'] . " " . $results2['comment'];
        } else {
            echo "You do not have a scheduled appointment.<br><br>";
            include("studenttable.html");
            }
        echo "<br><br>"; 
} else {// instructor view
    include("instructortable.html");
    }
?>
