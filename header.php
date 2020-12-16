<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

?>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

      <?php if ($_SESSION['loggedin'] === 1) { ?>
        <div class="d-flex flex-grow-1">
          <span class="w-100 d-lg-none d-block">
            <!-- hidden spacer to center brand on mobile --></span>
          <a class="navbar-brand d-none d-lg-inline-block" href="index.php">
            Scheduling App
          </a>
          <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="index.php">
            <!-- <img src="//placehold.it/40?text=LOGO" alt="logo"> -->
            <span class="navbar-brand">Scheduling App</span>
          </a>
          <div class="w-100 text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div> <?php } else { ?>
        <div class="d-flex flex-grow-1">
          <span class="w-100 d-lg-none d-block">
            <!-- hidden spacer to center brand on mobile --></span>
          <a class="navbar-brand d-none d-lg-inline-block" href="index.php">
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
        </div> <?php } ?>

      <div class="collapse navbar-collapse flex-grow-1 text-right">
        <div class="collapse navbar-collapse flex-grow-1 text-right">
          <ul class="navbar-nav ml-auto flex-nowrap text-white">
            <?php

            error_reporting(E_ERROR | E_WARNING | E_PARSE);

            if (!isset($_SESSION['loggedin'])) $login = false;
            if ($_SESSION['loggedin'] == 1) $login = true;
            if ($_SESSION['accountType'] == 1) $admin = false;
            if ($_SESSION['accountType'] == 2) $admin = true;

            $curPageName = basename($_SERVER["REQUEST_URI"]);

            $urls_main = array(
              'About' => 'about.php',
              'Features' => 'features.php',
            );

            $urls_student = array(
              'Dashboard' => 'dashboard.php',
              'Settings' => 'settings.php',
            );

            $urls_prof = array(
              'Dashboard' => 'dashboard.php',
              'Calendar' => 'calendar.php',
              'Settings' => 'settings.php',
            );

            $urls = (!$login) ? $urls_main : ((!$admin) ? $urls_prof : $urls_student);

            foreach ($urls as $name => $url) {
              print '<li class="nav-item"><a class="nav-link m-2 menu-item' . ((strcasecmp($curPageName, $url) == 0) ? ' active' : '') . '"href=' . $url . '>' . $name . '</a></li>';
            }

            if (!$login)
              print '
                      <li class="nav-item m-2">
                        <form action="register.php" method="post">
                          <button class="btn btn-primary text-white m-2 my-sm-0">Register</button>
                        </form>
                      </li>
                      <li class="nav-item m-2">
                        <form action="signin.php" method="post">
                          <button class="btn btn-outline-primary text-white m-2 my-sm-0">Sign In</button>
                        </form>
                      </li>
                    ';
            else
              print '
                        <li class="nav-item m-2">
                          <form action="signout.php" method="post">
                            <button class="btn btn-danger text-white m-2 my-sm-0">Sign Out</button>
                          </form>
                        </li>
                      ';
            ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>