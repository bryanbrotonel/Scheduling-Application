<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$usersID = $_SESSION['usersID'];
$availableID = $_POST['availableID'];
$_SESSION['availableID'] = $availableID;
include_once("config.php");

echo $usersID . " " . $availableID;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Appointment</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div><h1>Schedule an Appointment</h1></div>
        <br>
        <div>
            <form method="post" action="process.php">
                <input type="text" name="course" placeholder="Course..." required><br><br><!-- comment -->
                <input type="text" name="cSection" placeholder="Section..." required><br><br><!-- comment -->
                <select name="platform" placeholder="Platform..." required>
                    <option value="Big Blue Button">Big Blue Button</option>
                    <option value="Zoom">Zoom</option>
                    <option value="MS Teams">MS Teams</option>
                </select><br><br><!-- comment -->
                <textarea name="comment" placeholder="Comment..." required></textarea><br><!-- comment -->
                <input type="submit" value="Schedule" name="schedule">
            </form>
        </div>
    </body>
</html>