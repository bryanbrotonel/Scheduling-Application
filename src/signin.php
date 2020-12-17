<style>
    .form-signin {
        width: 100%;
        max-width: 460px;
        padding: 100px;
        margin: auto;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>

<div class="container">
    <main class="form-signin bg-light rounded border">
        <form method="post" action="process/process.php">
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="Signin" name="login">
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
        </form>
    </main>
</div>