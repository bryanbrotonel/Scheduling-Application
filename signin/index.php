<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'signin') {
    include('signin.php');
}
