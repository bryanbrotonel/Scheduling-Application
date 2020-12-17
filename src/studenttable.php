<div>
    <table border="1">
        <caption>Select a Date and Time</caption>
        <tr>
            <td>ID</td>
            <th>Date</th>
            <th>Start</th>
            <th>End</th>
            <th>Select</th>
        </tr>

        <?php foreach ($results3 as $available_appointment) { ?>
            <tr>
                <td><?php echo $available_appointment['availableID'] ?></td>
                <td><?php echo $available_appointment['availableDate'] ?></td>
                <td><?php echo $available_appointment['availableStart'] ?></td>
                <td><?php echo $available_appointment['availableEnd'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scheduleAppointment-<?php echo $available_appointment['availableID'] ?>">
                        Select
                    </button>
                    <div class="modal fade" id="scheduleAppointment-<?php echo $available_appointment['availableID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Book an Appointment | <?php echo $available_appointment['availableID'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <form method="post" action="process/scheduleappointment.php">
                                            <input type="hidden" value="<?php echo $available_appointment['availableID'] ?>" name="availableID">
                                            <input type="text" name="course" placeholder="Course..." required><br><br>
                                            <input type="text" name="cSection" placeholder="Section..." required><br><br>
                                            <select name="platform" placeholder="Platform..." required>
                                                <option value="Big Blue Button">Big Blue Button</option>
                                                <option value="Zoom">Zoom</option>
                                                <option value="MS Teams">MS Teams</option>
                                            </select><br><br>
                                            <textarea name="comment" placeholder="Comment..." required></textarea><br><br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit" value="Schedule" name="schedule">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>