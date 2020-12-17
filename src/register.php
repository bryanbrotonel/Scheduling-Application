<div class="container">
    <main class="form-user bg-light rounded border">
        <form method="post" action="process/process.php">
            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <input type="text" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <input type="hidden" name="type" value="2">
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Register" name="signup">
        </form>
    </main>
</div>