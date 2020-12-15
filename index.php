<?php
include_once("connection/config.php");
$con=config::connect();

$results=fetchRecords($con);
function fetchRecords($con){
    $query = $con->prepare("SELECT * FROM users;");
    $query->execute();
    return $query->fetchAll();
}
?>
<?php include 'view/header.php'; ?>
        <div><h1>Home</h1></div>
        <div>
            <table border="1">
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
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
<?php include 'view/footer.php'; ?>