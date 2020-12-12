<?php
include_once("config.php");
$con=config::connect();

$results=fetchRecords($con);
function fetchRecords($con){
    $query = $con->prepare("SELECT * FROM users;");
    $query->execute();
    return $query->fetchAll();
}
?>
<!DOCTYPE html>
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
                <?php foreach($results as $user) { ?>
                    <tr>
                        <td><?php echo $user['usersUsername']?></td>
                        <td><?php echo $user['usersName']?></td>
                        <td><?php echo $user['usersEmail']?></td>
                    </tr>  
                <?php } ?>
            </table>
        </div>  
    </body>
</html>