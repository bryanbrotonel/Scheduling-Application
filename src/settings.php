<script>
	$("#updateUserBtn").click(function() {
		$("#updateUserModal").modal();
	});
</script>

<div id="main">
	<h1 class="top">Settings</h1>

	<div>
		<button class="btn btn-primary" id="updateUserBtn">Update User</button>
	</div>
	<div>
		<?php if ($_SESSION['accountType'] == 2) { ?>
			<a href='process/deleteuser.php' onclick="return confirm('Are you sure?')">
				<button class="btn btn-danger">Delete User</button>
			</a>
		<?php } ?>
	</div>
</div>

<div class="modal" id="updateUserModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Modal body text goes here.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>