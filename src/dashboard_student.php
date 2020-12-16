<div id="main">
    <?php echo $accountID; ?>
    <h1 class="top">Student Dashboard</h1>
    Welcome <?php echo $results['usersName'] ?> &nbsp; / &nbsp; <?php echo $_SESSION['usersUsername'] ?> <br>
    <br>
    <?php
    if (isset($_SESSION['availableID'])) { ?>
        <a href='../update/updateappointment.php'>Update Appointment</a> &nbsp;
        <a href='process/deleteappointment.php' onclick="return confirm('Are you sure?')">Delete Appointment</a>
        <br><br>
        Your scheduled appointments:<br>
        &nbsp;&nbsp;&nbsp;
        Appointment scheduled for:
        <?php echo $results4['availableDate'] . " " . $results4['availableStart'] . " " . $results4['availableEnd']; ?>
        <br>&nbsp;&nbsp;&nbsp;
        Appointment details:
    <?php echo $results2['course'] . " " . $results2['cSection'] . " " . $results2['platform'] . " " . $results2['comment'];
    } else { ?>
        You do not have a scheduled appointment.<br><br>
    <?php include("studenttable.php");
    } ?>
</div>