<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'calendar') {
    include('calendar.php');
}
