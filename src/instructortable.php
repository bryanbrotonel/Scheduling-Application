<div>
    <table border="1">
        <caption>All Scheduled Appointments</caption>
        <tr>
            <td>Student Name</td>
            <td>Student Email</td>
            <td>Date</td>
            <th>Start Time</th>
            <th>Course</th>
            <th>Section</th>
            <th>Platform</th>
            <th>Comments</th>
        </tr>

        <?php foreach ($results5 as $scheduled_appointment) { ?>
            <tr>
                <td><?php echo $scheduled_appointment['usersName'] ?></td>
                <td><a href="mailto:<?php echo $scheduled_appointment['usersEmail'] ?>"><?php echo $scheduled_appointment['usersEmail'] ?></a></td>
                <td><?php echo $scheduled_appointment['availableDate'] ?></td>
                <td><?php echo $scheduled_appointment['availableStart'] ?></td>
                <td><?php echo $scheduled_appointment['course'] ?></td>
                <td><?php echo $scheduled_appointment['cSection'] ?></td>
                <td><?php echo $scheduled_appointment['platform'] ?></td>
                <td><?php echo $scheduled_appointment['comment'] ?></td>
                <td>
                    <form method="post" action="process/deleteappointment.php" onsubmit="return confirm('Are you sure?');">
                        <input type="submit" value="Delete" name="delete">
                        <input type="hidden" value="<?php echo $scheduled_appointment['comment'] ?>" name="comment">
                        <input type="hidden" value="<?php echo $scheduled_appointment['availableStart'] ?>" name="availableStart">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>