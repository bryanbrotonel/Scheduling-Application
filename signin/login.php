<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="index.php"><img src="kpu-logo-1.png" alt="logo" style="width:50px;height:50px;"></a>
        <div><h1>Login</h1></div>
        <div>
            <a href="index.php">Home</a>
            <!-- <a href="signup.php">Sign Up</a> -->
        </div>
        <br>
        <div>
            <form method="post" action="../process.php">
                <input type="text" name="username" placeholder="Username..." required>
                <input type="password" name="password" placeholder="Password..." required>
                <input type="submit" value="Login" name="login">
            </form>
        </div>
    </body>
</html>