<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
                <input type="text" name="username" placeholder="Username..." required><!-- comment -->
                <input type="password" name="password" placeholder="Password..." required><!-- comment -->
                <input type="text" name="name" placeholder="Name..." required><!-- comment -->
                <input type="text" name="email" placeholder="Email..." required><!-- comment -->
            <!--<input type="hidden" name="type" value="2">-->
                <input type="submit" value="Update User" name="update">
            </form>
        </div>
    </body>
        
</html>