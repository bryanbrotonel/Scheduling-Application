<?php

$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
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
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="dashboard" class="nav-link m-2 menu-item <?php if ($curPageName == 'appointments') echo 'active' ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="calendar" class="nav-link m-2 menu-item <?php if ($curPageName == 'calendar') echo 'active' ?>">Calendar</a>
                </li>
                <li class="nav-item">
                    <a href="settings" class="nav-link m-2 menu-item <?php if ($curPageName == 'settings') echo 'active' ?>">Settings</a>
                </li>
                <li class="nav-item m-2">
                    <form action="" method="post">
                        <button class="btn btn-danger my-2 my-sm-0">
                            Sign Out
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>