<div id="main">
    <div class="container">
        <div class="dash_header">
            <h1 class="my-4">Professor Dashboard</h1>
            <h2> Welcome, <?php echo $results['usersName'] ?> </h2>
        </div>

        <div class="row justify-content-md-center my-5">
            <div class="col-lg-10">
                <div class="bg-light rounded border p-5 mb-5">
                    <h3>Your Upcomming Appointments</h3>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class=" col-10">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Student Email</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Section</th>
                                        <th scope="col">Platform</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results5 as $scheduled_appointment) { ?>
                                        <tr>
                                            <td class="align-middle"><?php echo $scheduled_appointment['usersName'] ?></td>
                                            <td class="align-middle"><a href="mailto:<?php echo $scheduled_appointment['usersEmail'] ?>"><?php echo $scheduled_appointment['usersEmail'] ?></a></td>
                                            <td class="align-middle"><?php echo $scheduled_appointment['availableDate'] ?></td>
                                            <td class="align-middle"><?php echo $scheduled_appointment['availableStart'] ?></td>
                                            <td class="align-middle"><?php echo $scheduled_appointment['course'] ?></td>
                                            <td class="align-middle"><?php echo $scheduled_appointment['cSection'] ?></td>
                                            <td class="align-middle"><?php echo $scheduled_appointment['platform'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>