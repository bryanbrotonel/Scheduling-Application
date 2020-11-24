<?php
include_once("config.php");
$con=config::connect();

$results=fetchRecords($con);
function fetchRecords($con){
    $query = $con->prepare("
                        SELECT * FROM users
            ");
    $query->execute();
    return $query->fetchAll();
}

$results2=fetchRecords2($con);
function fetchRecords2($con){
    $query2 = $con->prepare("
                        SELECT * FROM available_appointment
            ");
    $query2->execute();
    return $query2->fetchAll();
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Scheduling Application</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="index.php"><img src="kpu-logo-1.png" alt="logo" style="width:50px;height:50px;"></a>
        <div><h1>Login or Sign Up</h1></div>
        <div>
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        </div>
        <br>
        <div>
            <table border="1">
                <tr>
                    <th>Username</th><!-- comment -->
                    <th>Name</th><!-- comment -->
                    <th>Email</th><!-- comment -->
                </tr>
                
                <?php
                    foreach($results as $user){?>
                <tr>
                    <td><?php echo $user['usersUsername']?></td>
                    <td><?php echo $user['usersName']?></td>
                    <td><?php echo $user['usersEmail']?></td>
                </tr>  
                    <?php }
                ?>
            </table>
        </div>
        <br>
        <!--<div>
            <table border="1">
                <tr>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Select</th>
                </tr>
                
                <?php
                    foreach($results2 as $available_appointment){?>
                <tr>
                    <td><?php echo $available_appointment['availableDate']?></td>
                    <td><?php echo $available_appointment['availableStart']?></td>
                    <td><?php echo $available_appointment['availableEnd']?></td>
                    <td><form method="post" action="login.php"><input type="submit" value="Select" name="checked"></form></td>
                </tr>  
                    <?php }
                ?>
            </table> 
        </div>-->
        
    </body>
</html>
