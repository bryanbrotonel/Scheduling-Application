<?php
session_start();
$username = $_SESSION['usersUsername'];
include_once("config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
    </head>
    <body>
        <div>
            <h1>Update User</h1>
        </div>
        <div>
            <form method="post" action="process.php">
                <input type="text" name="username" placeholder="Username..." required>
                <input type="password" name="password" placeholder="Password..." required>
                <input type="text" name="name" placeholder="Name..." required>
                <input type="text" name="email" placeholder="Email..." required>
                <input type="submit" value="Update User" name="update">
            </form>
        </div>
    </body>   
</html>