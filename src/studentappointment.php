<h3>Your scheduled appointment</h3>
<br>
<div class="row">
    <div class="col-6">
        <h5>Date: <b><?php echo $results4['availableDate'] ?> </b> </h5>
        <h5>Time: <b> <?php echo $results4['availableStart'] ?> - <?php echo $results4['availableEnd'] ?> </b> </h5>
    </div>
    <div class="col-6">
        <h5>Course: <b><?php echo $results2['course'] ?> - <?php echo $results2['cSection'] ?> </b> </h5>
        <h5>Platform: <b> <?php echo $results2['platform'] ?> </b> </h5>
    </div>
    <div class="col-10 my-3">
        <h5>Comments</h5>
        <p><?php echo $results2['comment'] ?></p>
    </div>
</div>

<div class="row justify-content-evenly">
    <div class="col-6 d-flex justify-content-center">
        <a href='process/deleteappointment.php' onclick="return confirm('Are you sure?')">
            <button type="button" class="btn btn-danger">
                Delete Appointment
            </button>
        </a>
    </div>
    <div class="col-6 d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateAppointment">
            Modify Appointment
        </button>
    </div>
</div>