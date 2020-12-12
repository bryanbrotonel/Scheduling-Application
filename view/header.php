<!DOCTYPE html>
<html>
<!-- the head section -->

<head>
  <meta charset="UTF-8">
  <title>Scheduling App</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0;">
  <link rel="stylesheet" type="text/css" href="/book_apps/ch05_guitar_shop/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<!-- the body section -->

<body>
  <header>
    <!-- example 6 - center on mobile -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <div class="d-flex flex-grow-1">
          <span class="w-100 d-lg-none d-block">
            <!-- hidden spacer to center brand on mobile --></span>
          <a class="navbar-brand d-none d-lg-inline-block" href="#">
            Scheduling App
          </a>
          <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
            <!-- <img src="//placehold.it/40?text=LOGO" alt="logo"> -->
            <span class="navbar-brand">Scheduling App</span>
          </a>
          <div class="w-100 text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
          <ul class="navbar-nav ml-auto flex-nowrap">
            <li class="nav-item">
              <a href="about" class="nav-link m-2 menu-item nav-active">About</a>
            </li>
            <li class="nav-item">
              <a href="features" class="nav-link m-2 menu-item">Features</a>
            </li>
            <li class="nav-item m-2">
              <a href="register">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Register</button>
              </a>
            </li>
            <li class="nav-item m-2">
              <a href="signin">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Sign In</button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>

</body>

</html>