<?php include '../view/header.php'; ?>
<div id="main">
    <h1 class="top">Settings</h1>
	<a href='../update/updateuser.php'>Update User</a><br>
	<?php if ($_SESSION['accountType'] == 2) { ?>
	<a href='../process/deleteuser.php' onclick="return confirm('Are you sure?')">Delete User</a>
	<?php } ?>
</div>
<?php include '../view/footer.php'; ?>