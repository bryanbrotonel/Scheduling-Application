<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="index.php"><img src="kpu-logo-1.png" alt="logo" style="width:50px;height:50px;"></a>
        <div><h1>Sign Up</h1></div>
        <div>
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
        </div>
        <br>
        <div>
            <form method="post" action="process.php">
                <input type="text" name="username" placeholder="Username..." required><!-- comment -->
                <input type="password" name="password" placeholder="Password..." required><!-- comment -->
                <input type="text" name="name" placeholder="Name..." required><!-- comment -->
                <input type="text" name="email" placeholder="Email..." required><!-- comment -->
                <input type="hidden" name="type" value="2"><!-- comment -->
                <input type="submit" value="Sign Up" name="signup">
            </form>
        </div>
    </body>
</html>
