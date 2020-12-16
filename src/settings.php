<div id="main">
	<h1 class="top">Settings</h1>
	<div>
		<button class="btn btn-primary" data-toggle="modal" data-target="#updateUserModal">Update User</button>
	</div>
	<div>
		<?php if ($_SESSION['accountType'] == 2) { ?>
			<a href='process/deleteuser.php' onclick="return confirm('Are you sure?')">
				<button class="btn btn-danger">Delete User</button>
			</a>
		<?php } ?>
	</div>
</div>