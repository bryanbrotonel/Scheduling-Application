<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//$usersID = $_SESSION['usersID'];
//$availableID = $_SESSION['availableID'];
include_once("config.php");

echo $_SESSION['usersID'];
echo $_SESSION['availableID'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Appointment</title>
    </head>
    <body>
        <div>
            <h1>Update Appointment</h1>
        </div>
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
                <input type="hidden" value=$_SESSION['usersID'] name="usersID">
                <input type="hidden" value=$_SESSION['availableID'] name="availableID">
                <input type="submit" value="Update Appointment" name="updateSchedule">
            </form>
        </div>
    </body>
</html>