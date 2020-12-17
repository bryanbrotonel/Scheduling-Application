<style>
    .dash_header {
        margin: 5vh 0;
    }
</style>
<div id="main">
    <div class="container">
        <div class="dash_header">
            <h1 class="mb-4">Student Dashboard</h1>
            <h2> Welcome, <?php echo $results['usersName'] ?> </h2>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="bg-light rounded border p-5">
                    <?php include isset($_SESSION['availableID']) ? "studentappointment.php" : "studenttable.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateAppointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="process/updateappointment.php">
                    <input type="text" name="course" value="<?php echo $results2['course']; ?>" required><br><br>
                    <input type="text" name="cSection" value="<?php echo $results2['cSection']; ?>" required><br><br>
                    <select name="platform" placeholder="Platform" required>
                        <option value="Big Blue Button" <?php if ($results2['platform'] == "Big Blue Button")  echo "selected" ?>>Big Blue Button</option>
                        <option value="Zoom" <?php if ($results2['platform'] == "Zoom")  echo "selected" ?>>Zoom</option>
                        <option value="MS Teams" <?php if ($results2['platform'] == "MS Teams")  echo "selected" ?>>MS Teams</option>
                    </select>
                    <br><br>
                    <textarea name="comment" placeholder="Comment" required><?php echo $results2['comment']; ?></textarea>
                    <br><br>
                    <p class="text-muted">To change the date and time, delete the apppointment and create a new one.</p>
                    <input type="hidden" value=<?php $_SESSION['usersID'] ?> name="usersID">
                    <input type="hidden" value=<?php $_SESSION['availableID'] ?> name="availableID">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Update" name="updateSchedule">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>