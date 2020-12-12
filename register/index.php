<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'register') {
    include('register.php');
}
