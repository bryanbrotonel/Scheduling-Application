<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <?php include 'logo.php' ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php

        error_reporting(E_ERROR | E_WARNING | E_PARSE);

        if (!isset($_SESSION['loggedin'])) $login = false;
        if ($_SESSION['loggedin'] == 1) $login = true;
        if ($_SESSION['accountType'] == 1) $admin = false;
        if ($_SESSION['accountType'] == 2) $admin = true;

        $curPageName = basename($_SERVER["REQUEST_URI"]);

        $urls_main = array(
          'About' => '#about',
          'Features' => '#features',
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
          print '<li class="nav-item"><a class="nav-link' . ((strcasecmp($curPageName, $url) == 0) ? ' active' : '') . '"href=' . $url . '>' . $name . '</a></li>';
        }
        ?>
        <?php if (!$login) { ?>
          <li class="nav-item ms-lg-3 my-2 my-lg-0">
            <form action="register.php" method="post">
              <button class="btn btn-primary text-white">Register</button>
            </form>
          </li>
          <li class="nav-item ms-lg-3 my-2 my-lg-0">
            <form action="signin.php" method="post">
              <button class="btn btn-outline-primary text-white">Sign In</button>
            </form>
          </li>
        <?php } else { ?>
          <li class="nav-item ms-lg-3 my-2 my-lg-0">
            <form action="signout.php" method="post">
              <button class="btn btn-danger text-white">Sign Out</button>
            </form>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>