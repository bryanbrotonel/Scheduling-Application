<div id="main">
    <h1 class="top">Instructor Dashboard</h1>
	Welcome <?php echo $results['usersName'] ?> &nbsp; / &nbsp;  <?php echo $_SESSION['usersUsername'] ?> <br>
	<?php
    include("instructortable.php");
    ?>
</div>