<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'settings') {
    include('settings.php');
}
