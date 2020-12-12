<?php
session_start();
include_once("config.php");
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
                <input type="text" name="course" placeholder="Course..." required><br><br>
                <input type="text" name="cSection" placeholder="Section..." required><br><br>
                <select name="platform" placeholder="Platform..." required>
                    <option value="Big Blue Button">Big Blue Button</option>
                    <option value="Zoom">Zoom</option>
                    <option value="MS Teams">MS Teams</option>
                </select><br><br>
                <textarea name="comment" placeholder="Comment..." required></textarea><br>
                <input type="hidden" value=$_SESSION['usersID'] name="usersID">
                <input type="hidden" value=$_SESSION['availableID'] name="availableID">
                <input type="submit" value="Update Appointment" name="updateSchedule">
            </form>
        </div>
    </body>
</html>