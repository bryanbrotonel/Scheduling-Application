<div id="main">
    <h1 class="top">Register</h1>
</div>

<div>
    <form method="post" action="process/process.php">
        <input type="text" name="username" placeholder="Username..." required><br>
        <input type="password" name="password" placeholder="Password..." required><br>
        <input type="text" name="name" placeholder="Name..." required><br>
        <input type="text" name="email" placeholder="Email..." required><br>
        <input type="hidden" name="type" value="2">
        <input type="submit" value="Sign Up" name="signup">
    </form>
</div>