<div id="main">
    <?php echo $accountID; ?>
    <h1 class="top">Student Dashboard</h1>
    Welcome <?php echo $results['usersName'] ?> &nbsp; / &nbsp; <?php echo $_SESSION['usersUsername'] ?> <br>
    <br>
    <?php
    if (isset($_SESSION['availableID'])) { ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateAppointment">
            Update Appointment
        </button>
        <a href='process/deleteappointment.php' onclick="return confirm('Are you sure?')">
            <button type="button" class="btn btn-danger">
                Delete Appointment
            </button>
        </a>
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

<div class="modal fade" id="updateAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <form method="post" action="process/updateappointment.php">
                        <input type="text" name="course" value="<?php echo $results2['course']; ?>" required><br><br>
                        <input type="text" name="cSection" value="<?php echo $results2['cSection']; ?>" required><br><br>
                        <select name="platform" placeholder="Platform..." required>
                            <option value="Big Blue Button" <?php if ($results2['platform'] == "Big Blue Button")  echo "selected" ?>>Big Blue Button</option>
                            <option value="Zoom" <?php if ($results2['platform'] == "Zoom")  echo "selected" ?>>Zoom</option>
                            <option value="MS Teams" <?php if ($results2['platform'] == "MS Teams")  echo "selected" ?>>MS Teams</option>
                        </select><br><br>
                        <textarea name="comment" placeholder="Comment..." required><?php echo $results2['comment']; ?></textarea><br>
                        <input type="hidden" value=$_SESSION['usersID'] name="usersID">
                        <input type="hidden" value=$_SESSION['availableID'] name="availableID">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Update" name="updateSchedule">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>