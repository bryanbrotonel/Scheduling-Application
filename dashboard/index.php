<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'dashboard_student') {
    include('dashboard_student.php');
}
else if ($action = 'dashboard_prof') {
    include('dashboard_prof.php');
}
?>