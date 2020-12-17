<div class="container">
	<main class="form-user bg-light rounded border">
		<form method="post" action="process/process.php">
			<h1 class="h3 mb-3 fw-normal text-center">Update User</h1>
			<input type="text" name="username" class="form-control" value="<?php echo $user['usersUsername'] ?>" required autofocus>
			<input type="text" name="name" class="form-control" value="<?php echo $user['usersName'] ?>" required>
			<input type="text" name="email" class="form-control" value="<?php echo $user['usersEmail'] ?>" required>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<input type="hidden" name="type" value="2">
			<input class="w-100 mt-2 btn btn-lg btn-primary" type="submit" value="Update User" name="update">
		</form>
		<?php if ($_SESSION['accountType'] == 2) { ?>
			<a href='process/deleteuser.php' onclick="return confirm('Are you sure?')">
				<button class="w-100 mt-5 btn btn-lg btn-danger">Delete User</button>
			</a>
		<?php }

		?>
	</main>
</div>